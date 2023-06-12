<?php

namespace Gravity_Forms\Gravity_Forms\Config;

use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_Admin_I18n;
use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_Block_Editor;
use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_I18n;
use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_Legacy_Check;
use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_Legacy_Check_Multi;
use Gravity_Forms\Gravity_Forms\Config\Items\GF_Config_Multifile;

use Gravity_Forms\Gravity_Forms\GF_Service_Container;
use Gravity_Forms\Gravity_Forms\GF_Service_Provider;

/**
 * Class GF_Config_Service_Provider
 *
 * Service provider for the Config Service.
 *
 * @package Gravity_Forms\Gravity_Forms\Config
 */
class GF_Config_Service_Provider extends GF_Service_Provider {

	// Organizational services
	const CONFIG_COLLECTION = 'config_collection';
	const DATA_PARSER       = 'data_parser';

	// Config services
	const I18N_CONFIG         = 'i18n_config';
	const I18N_ADMIN_CONFIG   = 'i18n_admin_config';
	const LEGACY_CONFIG       = 'legacy_config';
	const LEGACY_MULTI_CONFIG = 'legacy_multi_config';
	const MULTIFILE_CONFIG    = 'multifile_config';
	const BLOCK_EDITOR_CONFIG = 'block_editor_config';

	/**
	 * Array mapping config class names to their container ID.
	 *
	 * @since 2.6
	 *
	 * @var string[]
	 */
	protected $configs = array(
		self::I18N_CONFIG         => GF_Config_I18n::class,
		self::I18N_ADMIN_CONFIG   => GF_Config_Admin_I18n::class,
		self::LEGACY_CONFIG       => GF_Config_Legacy_Check::class,
		self::LEGACY_MULTI_CONFIG => GF_Config_Legacy_Check_Multi::class,
		self::MULTIFILE_CONFIG    => GF_Config_Multifile::class,
		self::BLOCK_EDITOR_CONFIG => GF_Config_Block_Editor::class,
	);

	/**
	 * Register services to the container.
	 *
	 * @since 2.6
	 *
	 * @param GF_Service_Container $container
	 */
	public function register( GF_Service_Container $container ) {

		// Include required files.
		require_once( plugin_dir_path( __FILE__ ) . 'class-gf-config-collection.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'class-gf-config.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'class-gf-config-data-parser.php' );

		// Add to container
		$container->add( self::CONFIG_COLLECTION, function () {
			return new GF_Config_Collection();
		} );

		$container->add( self::DATA_PARSER, function () {
			return new GF_Config_Data_Parser();
		} );

		// Add configs to container.
		$this->register_config_items( $container );
		$this->register_configs_to_collection( $container );
	}

	/**
	 * Initiailize any actions or hooks.
	 *
	 * @since 2.6
	 *
	 * @param GF_Service_Container $container
	 *
	 * @return void
	 */
	public function init( GF_Service_Container $container ) {

		// Need to pass $this to callbacks; save as variable.
		$self = $this;

		add_action( 'wp_enqueue_scripts', function () use ( $container ) {
			$container->get( self::CONFIG_COLLECTION )->handle();
		}, 9999 );

		add_action( 'admin_enqueue_scripts', function () use ( $container ) {
			$container->get( self::CONFIG_COLLECTION )->handle();
		}, 9999 );

		add_action( 'gform_preview_init', function () use ( $container ) {
			$container->get( self::CONFIG_COLLECTION )->handle();
		}, 0 );

		add_action( 'rest_api_init', function () use ( $container, $self ) {
			register_rest_route( 'gravityforms/v2', '/tests/mock-data', array(
				'methods'             => 'GET',
				'callback'            => array( $self, 'config_mocks_endpoint' ),
				'permission_callback' => current_user_can( 'administrator' ),
			) );
		} );
	}

	/**
	 * For each config defined in $configs, instantiate and add to container.
	 *
	 * @since 2.6
	 *
	 * @param GF_Service_Container $container
	 *
	 * @return void
	 */
	private function register_config_items( GF_Service_Container $container ) {
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-i18n.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-admin-i18n.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-legacy-check.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-legacy-check-multi.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-multifile.php' );
		require_once( plugin_dir_path( __FILE__ ) . '/items/class-gf-config-block-editor.php' );

		$parser = $container->get( self::DATA_PARSER );

		foreach ( $this->configs as $name => $class ) {
			$container->add( $name, function () use ( $class, $parser ) {
				return new $class( $parser );
			} );
		}
	}

	/**
	 * Register each config defined in $configs to the GF_Config_Collection.
	 *
	 * @since 2.6
	 *
	 * @param GF_Service_Container $container
	 *
	 * @return void
	 */
	public function register_configs_to_collection( GF_Service_Container $container ) {
		$collection = $container->get( self::CONFIG_COLLECTION );

		foreach ( $this->configs as $name => $config ) {
			$config_class = $container->get( $name );
			$collection->add_config( $config_class );
		}
	}

	/**
	 * Callback for the Config Mocks REST endpoint.
	 *
	 * @since 2.6
	 *
	 * @return array
	 */
	public function config_mocks_endpoint() {
		define( 'GFORMS_DOING_MOCK', true );
		$container = \GFForms::get_service_container();
		$data      = $container->get( self::CONFIG_COLLECTION )->handle( false );

		return $data;
	}
}
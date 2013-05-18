<?php


function shoestrap_customizer_sections( $wp_customize ){

  $sections   = array();
  $sections[] = array( 'slug' => 'general',         'title' => __( 'General', 'shoestrap' ),          'priority' => 1 );
  $sections[] = array( 'slug' => 'logo',            'title' => __( 'Logo', 'shoestrap' ),             'priority' => 2 );
  $sections[] = array( 'slug' => 'layout',          'title' => __( 'Layout', 'shoestrap' ),           'priority' => 3 );
  $sections[] = array( 'slug' => 'navbar',          'title' => __( 'Navbar', 'shoestrap' ),           'priority' => 4 );
  $sections[] = array( 'slug' => 'header',          'title' => __( 'Header', 'shoestrap' ),           'priority' => 5 );
  $sections[] = array( 'slug' => 'typography',      'title' => __( 'Typography', 'shoestrap' ),       'priority' => 6 );
  $sections[] = array( 'slug' => 'featured_image',  'title' => __( 'Featured Image', 'shoestrap' ),   'priority' => 7 );
  $sections[] = array( 'slug' => 'jumbotron',       'title' => __( 'Jumbotron (Hero)', 'shoestrap' ), 'priority' => 8 );
  $sections[] = array( 'slug' => 'footer',          'title' => __( 'Footer', 'shoestrap' ),           'priority' => 9 );
  $sections[] = array( 'slug' => 'advanced',        'title' => __( 'Advanced', 'shoestrap' ),         'priority' => 10 );

  foreach( $sections as $section ){
    $wp_customize->add_section( $section['slug'], array( 'title' => $section['title'], 'priority' => $section['priority'] ) );
  }
}
add_action( 'customize_register', 'shoestrap_customizer_sections' );

function shoestrap_customizer_register( $wp_customize ) {
  // Remove the default "background" control
  $wp_customize->remove_control( 'background_color' );
  $wp_customize->remove_control( 'header_textcolor');

  // Background Color hack
  $background_color = get_theme_mod( 'background_color' );
  $background_color = '#' . str_replace( '#', '', $background_color );
  set_theme_mod( 'background_color', get_theme_mod( 'color_body_bg' ) );

  $settings   = array();

  $settings[] = array(
    'setting'   => 'color_body_bg',
    'default'   => '#ffffff',
    'type'      => 'color',
    'label'     => __( 'Background Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 1 
  );

  $settings[] = array(
    'setting'   => 'color_brand_primary',
    'default'   => '#428bca',
    'type'      => 'color',
    'label'     => __( '"Primary" Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_brand_success',
    'default'   => '#5cb85c',
    'type'      => 'color',
    'label'     => __( '"Success" Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_brand_warning',
    'default'   => '#f0ad4e',
    'type'      => 'color',
    'label'     => __( '"Warning" Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_brand_danger',
    'default'   => '#d9534f',
    'type'      => 'color',
    'label'     => __( '"Danger" Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_brand_info',
    'default'   => '#5bc0de',
    'type'      => 'color',
    'label'     => __( '"Info" Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_text',
    'default'   => '#333333',
    'type'      => 'color',
    'label'     => __( 'Text Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'color_links',
    'default'   => '#428bca',
    'type'      => 'color',
    'label'     => __( 'Links Color', 'shoestrap' ),
    'section'   => 'colors',
    'priority'  => 5 
  );

  $settings[] = array(
    'setting'   => 'footer_bg',
    'default'   => '#ffffff',
    'type'      => 'color',
    'label'     => __( 'Footer Background Color', 'shoestrap' ),
    'section'   => 'footer',
    'priority'  => 1 
  );

  $settings[] = array(
    'setting'   => 'footer_color',
    'default'   => '#333333',
    'type'      => 'color',
    'label'     => __( 'Footer Text Color', 'shoestrap' ),
    'section'   => 'footer',
    'priority'  => 2 
  );

  $settings[] = array(
    'setting'   => 'jumbotron_bg',
    'default'   => '#EEEEEE',
    'type'      => 'color',
    'label'     => __( 'Hero Region Background Color', 'shoestrap' ),
    'section'   => 'jumbotron',
    'priority'  => 7 
  );

  $settings[] = array(
    'setting'   => 'jumbotron_color',
    'default'   => '#333333',
    'type'      => 'color',
    'label'     => __( 'Hero Region Text Color', 'shoestrap' ),
    'section'   => 'jumbotron',
    'priority'  => 8 
  );

  $settings[] = array(
    'setting'   => 'navbar_bg',
    'default'   => '#EEEEEE',
    'type'      => 'color',
    'label'     => __( 'Navbar Color', 'shoestrap' ),
    'section'   => 'navbar',
    'priority'  => 5 
  );

  $settings[] = array( 'setting' => 'navbar_color',
    'default'   => '#777777',
    'type'      => 'color',
    'label'     => __( 'Navbar Text Color', 'shoestrap' ),
    'section'   => 'navbar',
    'priority'  => 40 
  );
 
  // Checkbox Controls
  $settings[] = array(
    'setting'   => 'feat_img_archive',
    'default'   => '',
    'type'      => 'checkbox',
    'label'     => __( 'Show featured images on archives', 'shoestrap' ),
    'section'   => 'featured_image',
    'priority'  => 1
  );
  $settings[] = array(
    'setting'   => 'feat_img_post',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Show featured images on single posts', 'shoestrap' ),
    'section'   => 'featured_image', 'priority' => 2
  );
  $settings[] = array(
    'setting'   => 'general_flat',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'No Gradients - Flat look', 'shoestrap' ),
    'section'   => 'general', 'priority' => 1
  );
  $settings[] = array(
    'setting'   => 'jumbotron_title_fit',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Use FitText for the Title', 'shoestrap' ),
    'section'   => 'jumbotron', 'priority' => 2
  );
  $settings[] = array(
    'setting'   => 'jumbotron_center',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Center the content', 'shoestrap' ), 
    'section'   => 'jumbotron', 'priority' => 10
  );
  $settings[] = array(
    'setting'   => 'navbar_toggle',
    'default'   => 1,
    'type'      => 'checkbox', 
    'label'     => __( 'Display NavBar on the top of the page', 'shoestrap' ),
    'section'   => 'navbar', 'priority' => 1
  );
  $settings[] = array(
    'setting'   => 'navbar_brand',
    'default'   => 1,
    'type'      => 'checkbox', 
    'label'     => __( 'Display Branding (Sitename or Logo)', 'shoestrap' ),
    'section'   => 'navbar', 'priority' => 2 );
  $settings[] = array(
    'setting'   => 'navbar_logo',
    'default'   => 1,
    'type'      => 'checkbox', 
    'label'     => __( 'Use Logo (if available) for branding', 'shoestrap' ),
    'section'   => 'navbar', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'navbar_social',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Display Social Links in the Navbar', 'shoestrap' ),
    'section'   => 'navbar', 'priority' => 6
  );
  $settings[] = array(
    'setting'   => 'navbar_search',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Display Search', 'shoestrap' ), 
    'section'   => 'navbar', 'priority' => 7
  );
  $settings[] = array(
    'setting'   => 'navbar_nav_right',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Menu on the Right', 'shoestrap' ), 
    'section'   => 'navbar', 'priority' => 15
  );
  $settings[] = array(
    'setting'   => 'navbar_usermenu',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Show Login/Logout Link', 'shoestrap' ), 
    'section'   => 'navbar', 'priority' => 5
  );
  $settings[] = array(
    'setting'   => 'navbar_altmenu',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( '"Alternative" Menu styling', 'shoestrap' ),
    'section'   => 'navbar', 'priority' => 37
  );
  $settings[] = array(
    'setting'   => 'layout_fluid',
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Fluid Layout', 'shoestrap' ), 
    'section'   => 'layout', 'priority' => 7
  );

// Text Controls
  $settings[] = array(
    'setting'   => 'general_border_radius', 
    'default'   => 4,
    'type'      => 'text', 
    'label'     => __( 'Border Radius (px)', 'shoestrap' ),
    'section'   => 'general', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'feat_img_archive_width', 
    'default'   => 550,
    'type'      => 'text', 
    'label'     => __( 'Image width (archives)', 'shoestrap' ),
    'section'   => 'featured_image', 'priority' => 4
  );
  $settings[] = array(
    'setting'   => 'feat_img_archive_height', 
    'default'   => 300,
    'type'      => 'text', 
    'label'     => __( 'Image height (archives)', 'shoestrap' ),
    'section'   => 'featured_image', 'priority' => 5
  );
  $settings[] = array(
    'setting'   => 'feat_img_post_width', 
    'default'   => 550,
    'type'      => 'text', 
    'label'     => __( 'Image width (single posts)', 'shoestrap' ),
    'section'   => 'featured_image', 'priority' => 7
  );
  $settings[] = array(
    'setting'   => 'feat_img_post_height', 
    'default'   => 300,
    'type'      => 'text', 
    'label'     => __( 'Image height (single posts)', 'shoestrap' ),
    'section'   => 'featured_image', 'priority' => 8
  );
  $settings[] = array(
    'setting'   => 'footer_text',
    'default'   => get_bloginfo( 'name' ),
    'type'      => 'text', 
    'label'     => __( 'Footer Text', 'shoestrap' ), 
    'section'   => 'footer', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'navbar_height', 
    'default'   => 50,
    'type'      => 'text', 
    'label'     => __( 'Navbar Height (px)', 'shoestrap' ),
    'section'   => 'navbar',
    'priority'  => 40
  );
  $settings[] = array(
    'setting'   => 'typography_sans_serif', 
    'default'   => '"Helvetica Neue", Helvetica, Arial, sans-serif',
    'type'      => 'text', 
    'label'     => __( 'Sans Serif Font Family', 'shoestrap' ),
    'section'   => 'typography', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'typography_serif', 
    'default'   => 'Georgia, "Times New Roman", Times, serif',
    'type'      => 'text', 
    'label'     => __( 'Serif Font Family', 'shoestrap' ),
    'section'   => 'typography', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'typography_font_size_base', 
    'default'   => 14,
    'type'      => 'text', 
    'label'     => __( 'Sans Serif Font Family', 'shoestrap' ),
    'section'   => 'typography', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'layout_screen_tiny', 
    'default'   => 480,
    'type'      => 'text', 
    'label'     => __( 'Tiny Screen Size (px)', 'shoestrap' ),
    'section'   => 'layout', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'layout_screen_small', 
    'default'   => 768,
    'type'      => 'text', 
    'label'     => __( 'Small Screen Size (px)', 'shoestrap' ),
    'section'   => 'layout', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'layout_screen_medium', 
    'default'   => 992,
    'type'      => 'text', 
    'label'     => __( 'Medium Screen Size (px)', 'shoestrap' ),
    'section'   => 'layout', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'layout_screen_large', 
    'default'   => 1200,
    'type'      => 'text', 
    'label'     => __( 'Large Screen Size (px)', 'shoestrap' ),
    'section'   => 'layout', 'priority' => 3
  );
  $settings[] = array(
    'setting'   => 'layout_gutter', 
    'default'   => 30,
    'type'      => 'text', 
    'label'     => __( 'Gutter', 'shoestrap' ), 
    'section'   => 'layout', 'priority' => 3
  );

  // Dropdown (Select) Controls
  $settings[] = array(
    'setting'   => 'jumbotron_visibility', 
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Display only on Frontpage', 'shoestrap' ),
    'section'   => 'jumbotron',
    'priority'  => 9
  );

  $settings[] = array(
    'setting'   => 'jumbotron_nocontainer', 
    'default'   => '',
    'type'      => 'checkbox', 
    'label'     => __( 'Remove Container - Make Full Width', 'shoestrap' ),
    'section'   => 'jumbotron',
    'priority'  => 15
  );

  $settings[] = array(
    'setting'   => 'navbar_position', 
    'default'   => 0,
    'type'      => 'select', 
    'label'     => __( 'NavBar Positioning', 'shoestrap' ),
    'section'   => 'navbar',
    'priority'  => 32,
    'choises'   => array(
      0         => __( 'Normal', 'shoestrap' ),
      1         => __( 'Fixed to Top', 'shoestrap' ),
      2         => __( 'Fixed to Bottom', 'shoestrap' )
    )
  );
  $settings[] = array(
    'setting'   => 'typography_webfont_weight', 
    'default'   => 400,
    'type'      => 'select', 
    'label'     => __( 'Webfont weight:', 'shoestrap' ),
    'section'   => 'typography',
    'priority'  => 4,
    'choises'   => array(
      200     => __( '200', 'shoestrap' ),
      300     => __( '300', 'shoestrap' ),
      400     => __( '400', 'shoestrap' ),
      600     => __( '600', 'shoestrap' ),
      700     => __( '700', 'shoestrap' ),
      800     => __( '800', 'shoestrap' ),
      900     => __( '900', 'shoestrap' ) 
    )
  );
  $settings[] = array(
    'setting'   => 'typography_webfont', 
    'default'   => 'latin',
    'type'      => 'select', 
    'label'     => __( 'Webfont character set:', 'shoestrap' ),
    'section'   => 'typography',
    'priority'  => 5,
    'choises'   => array(
      'cyrillic'      => __( 'Cyrillic', 'shoestrap' ),
      'cyrillic-ext'  => __( 'Cyrillic Extended', 'shoestrap' ),
      'greek'         => __( 'Greek', 'shoestrap' ),
      'greek-ext'     => __( 'Greek Extended', 'shoestrap' ),
      'latin'         => __( 'Latin', 'shoestrap' ),
      'latin-ext'     => __( 'Latin Extended', 'shoestrap' ),
      'vietnamese'    => __( 'Vietnamese', 'shoestrap' )
    )
  );
  $settings[] = array(
    'setting'   => 'typography_webfont_assign', 
    'default'   => 'all',
    'type'      => 'select', 
    'label'     => __( 'Apply Webfont to:', 'shoestrap' ),
    'section'   => 'typography',
    'priority'  => 6,
    'choises'   => array(
      'sitename'  => __( 'Site Name', 'shoestrap' ),
      'headers'   => __( 'Headers', 'shoestrap' ),
      'all'       => __( 'Everywhere', 'shoestrap' )
    )
  );
  $settings[] = array(
    'setting'   => 'layout_layout', 
    'default'   => 'mp',
    'type'      => 'select', 
    'label'     => __( 'Layout', 'shoestrap' ), 
    'section'   => 'layout',
    'priority'  => 2,
    'choises'   => array(
      'm'       => __( 'Main only', 'shoestrap' ),
      'mp'      => __( 'Main-Primary', 'shoestrap' ),
      'pm'      => __( 'Primary-Main', 'shoestrap' ),
      'ms'      => __( 'Main-Secondary', 'shoestrap' ),
      'sm'      => __( 'Secondary-Main', 'shoestrap' ),
      'mps'     => __( 'Main-Primary-Secondary', 'shoestrap' ),
      'msp'     => __( 'Main-Secondary-Primary', 'shoestrap' ),
      'pms'     => __( 'Primary-Main-Secondary', 'shoestrap' ),
      'psm'     => __( 'Primary-Secondary-Main', 'shoestrap' ),
      'smp'     => __( 'Secondary-Main-Primary', 'shoestrap' ),
      'spm'     => __( 'Secondary-Primary-Main', 'shoestrap' )
    )
  );
  $settings[] = array(
    'setting'   => 'layout_primary_width', 
    'default'   => 4,
    'type'      => 'select', 
    'label'     => __( 'Primary Sidebar Width', 'shoestrap' ),
    'section'   => 'layout',
    'priority'  => 3,
    'choises'   => array(
      2         => '2/12',
      3         => '3/12',
      4         => '4/12',
      5         => '5/12',
      6         => '6/12'
    )
  );
  $settings[] = array(
    'setting'   => 'layout_secondary_width',
    'default'   => 3,
    'type'      => 'select', 
    'label'     => __( 'Secondary Sidebar Width', 'shoestrap' ),
    'section'   => 'layout',
    'priority'  => 5,
    'choises'   => array(
      2         => '2/12',
      3         => '3/12',
      4         => '4/12'
    )
  );
  $settings[] = array(
    'setting'   => 'layout_sidebar_on_front', 
    'default'   => 'hide',
    'type'      => 'select', 
    'label'     => __( 'Show sidebars on the Home Page', 'shoestrap' ),
    'section'   => 'layout',
    'priority'  => 6,
    'choises'   => array(
      'show'    => __( 'Show', 'shoestrap' ),
      'hide'    => __( 'Hide', 'shoestrap' )
    )
  );

  // Image Controls
  $settings[] = array(
    'setting'   => 'jumbotron_bg_img', 
    'type'      => 'image', 
    'default'   => '',
    'label'     => __( 'Hero Background Image', 'shoestrap' ),
    'section'   => 'jumbotron',
    'priority'  => 6
  );
  $settings[] = array(
    'setting'   => 'logo',
    'type'      => 'image', 
    'default'   => '',
    'label'     => __( 'Logo Image', 'shoestrap' ),
    'section'   => 'logo',
    'priority'  => 2
  );

  // Texatarea Controls
  $settings[] = array(
    'setting'   => 'advanced_head',
    'type'      => 'textarea',
    'default'   => '',
    'label'     => __( 'Header Scripts (CSS/JS)', 'shoestrap' ),
    'section'   => 'advanced',
    'priority'  => 1
  );

  $settings[] = array(
    'setting'   => 'advanced_footer',
    'type'      => 'textarea',
    'default'   => '',
    'label'     => __( 'Footer Scripts (CSS/JS)', 'shoestrap' ),
    'section'   => 'advanced',
    'priority'  => 3
  );

  $settings[] = array(
    'setting'   => 'header_bg',
    'type'      => 'color',
    'default'   => '#EEEEEE',
    'label'     => __( 'Background Color', 'shoestrap' ),
    'section'   => 'header',
    'priority'  => 3
  );

  $settings[] = array(
    'setting'   => 'header_color',
    'type'      => 'color',
    'default'   => '#333333',
    'label'     => __( 'Text Color', 'shoestrap' ),
    'section'   => 'header',
    'priority'  => 4
  );

  $settings[] = array(
    'setting'   => 'header_toggle',
    'type'      => 'checkbox',
    'default'   => '',
    'label'     => __( 'Display Header', 'shoestrap' ),
    'section'   => 'header',
    'priority'  => 1
  );

  $settings[] = array(
    'setting'   => 'header_branding',
    'type'      => 'checkbox',
    'default'   => '',
    'label'     => __( 'Display Branding', 'shoestrap' ),
    'section'   => 'header',
    'priority'  => 2
  );

  foreach ( $settings as $setting ) {
    $wp_customize->add_setting( $setting[ 'setting' ], array(
      'default'     => $setting['default'],
      'type'        => 'theme_mod',
      'capability'  => 'edit_theme_options'
    ));

    if ( $setting['type'] == 'text' ) {
      $wp_customize->add_control( $setting['setting'], array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'type'      => 'text',
        'priority'  => $setting['priority']
      ));
    } elseif ( $setting['type'] == 'color' ) {
      $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, $setting['setting'],array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'priority'  => $setting['priority'],
      )));
    } elseif ( $setting['type'] == 'image' ) {
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting['setting'], array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'priority'  => $setting['priority']
      )));
    } elseif ( $setting['type'] == 'select' ) {
      $wp_customize->add_control( $setting['setting'], array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'type'      => 'select',
        'priority'  => $setting['priority'],
        'choices'   => $setting['choises']
      ));
    } elseif ( $setting['type'] == 'checkbox' ) {
      $wp_customize->add_control( $setting['setting'], array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'type'      => 'checkbox',
        'priority'  => $setting['priority'],
      ));
    } elseif ( $setting['type'] == 'textarea' ) {
      $wp_customize->add_control( new Shoestrap_Customize_Textarea_Control( $wp_customize, 'advanced_head', array(
        'label'     => $setting['label'],
        'section'   => $setting['section'],
        'settings'  => $setting['setting'],
        'priority'  => $setting['priority'],
      )));
    }
  }
}
add_action( 'customize_register', 'shoestrap_customizer_register' );

<?php
// Register 'Projects' Custom Post Type
function register_projects_cpt() {
    $labels = array(
        'name'                  => _x('Projects', 'portfolio-theme'),
        'singular_name'         => _x('Project', 'portfolio-theme'),
        'add_new'               => _x('Add New', 'portfolio-theme'),
        'add_new_item'          => __('Add New Project', 'portfolio-theme'),
        'new_item'              => __('New Project', 'portfolio-theme'),
        'edit_item'             => __('Edit Project', 'portfolio-theme'),
        'view_item'             => __('View Project', 'portfolio-theme'),
        'all_items'             => __('All Projects', 'portfolio-theme'),
        'search_items'          => __('Search Projects', 'portfolio-theme'),
        'not_found'             => __('No projects found.', 'portfolio-theme'),
        'not_found_in_trash'    => __('No projects found in Trash.', 'portfolio-theme'),
        'archives'              => __('Project Archives', 'portfolio-theme'),
        'attributes'            => __('Project Attributes', 'portfolio-theme'),
        'insert_into_item'      => __('Insert into project', 'portfolio-theme'),
        'uploaded_to_this_item' => __('Uploaded to this project', 'portfolio-theme'),
        'featured_image'        => __('Project featured image', 'portfolio-theme'),
        'set_featured_image'    => __('Set project featured image', 'portfolio-theme'),
        'remove_featured_image' => __('Remove project featured image', 'portfolio-theme'),
        'use_featured_image'    => __('Use as featured image', 'portfolio-theme'),
        'menu_name'             => _x('Projects', 'admin menu', 'portfolio-theme'),
        'filter_items_list'     => __('Filter Projects list', 'portfolio-theme'),
        'items_list_navigation' => __('Projects list navigation', 'portfolio-theme'),
        'items_list'            => __('Projects list', 'portfolio-theme'),
        'item_published'        => __('Project published.', 'portfolio-theme'),
        'item_published_privately' => __('Project published privately.', 'portfolio-theme'),
        'item_revereted_to_draft'  => __('Project reverted to draft.', 'portfolio-theme'),
        'item_trashed'             => __('Project trashed.', 'portfolio-theme'),
        'item_scheduled'           => __('Project scheduled.', 'portfolio-theme'),
        'item_updated'             => __('Project updated.', 'portfolio-theme'),
        'item_link'                => __('Project link.', 'portfolio-theme'),
        'item_link_description'    => __('A link to a project.', 'portfolio-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true, // REST API support
        'query_var'          => true,
        'rewrite'            => array('slug' => 'projects'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-archive',
        'supports'           => array('title', 'editor', 'thumbnail'),
    );
    register_post_type('fwd-projects', $args);
}
add_action('init', 'register_projects_cpt');

// Register 'Tech Stack' Custom Taxonomy
function register_tech_stack_taxonomy() {
    $labels = array(
        'name'              => __('Tech Stack', 'portfolio-theme'),
        'singular_name'     => __('Tech Stack', 'portfolio-theme'),
        'search_items'      => __('Search Tech Stacks', 'portfolio-theme'),
        'all_items'         => __('All Tech Stacks', 'portfolio-theme'),
        'edit_item'         => __('Edit Tech Stack', 'portfolio-theme'),
        'update_item'       => __('Update Tech Stack', 'portfolio-theme'),
        'add_new_item'      => __('Add New Tech Stack', 'portfolio-theme'),
        'new_item_name'     => __('New Tech Stack Name', 'portfolio-theme'),
        'menu_name'         => __('Tech Stack', 'portfolio-theme'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'rewrite'           => array('slug' => 'tech-stack'),
    );
    register_taxonomy('fwd-tech-stack', array('fwd-projects'), $args);
}
add_action('init', 'register_tech_stack_taxonomy');

// Flush Rewrite Rules on Theme Activation
function portfolio_rewrite_flush() {
    register_projects_cpt();
    register_tech_stack_taxonomy();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'portfolio_rewrite_flush');

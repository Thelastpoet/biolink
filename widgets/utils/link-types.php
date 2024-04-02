<?php
/**
 * List to add to CTA Links Link Type Dropdown
 */

$url_types = [
    'url' => __( 'URL', 'biolink' ),
    'file' => __( 'File Download', 'biolink' ),
];

$messaging_types = [
    'email' => __( 'Email', 'biolink' ),
    'tel' => __( 'Tel', 'biolink' ),
    'telegram' => __( 'Telegram', 'biolink' ),
    'waze' => __( 'Waze', 'biolink' ),
    'whatsapp' => __( 'Whatsapp', 'biolink' ),
];

$social_types = [
    'facebook' => __( 'Facebook', 'biolink' ),
    'instagram' => __( 'Instagram', 'biolink' ),
    'linkedin' => __( 'LinkedIn', 'biolink' ),
    'pinterest' => __( 'Pinterest', 'biolink' ),
    'tiktok' => __( 'TikTok', 'biolink' ),
    'twitter' => __( 'Twitter', 'biolink' ),
    'youtube' => __( 'YouTube', 'biolink' ),
];

$other_types = [
    'apple-music' => __( 'Apple Music', 'biolink' ),
    'behance' => __( 'Behance', 'biolink' ),
    'dribbble' => __( 'Dribbble', 'biolink' ),
    'spotify' => __( 'Spotify', 'biolink' ),
    'soundcloud' => __( 'SoundCloud', 'biolink' ),
    'vimeo' => __( 'Vimeo', 'biolink' ),
];

$link_type_options = array_merge(
    [
        'URL' => $url_types,
    ],
    [
        'Messaging' => $messaging_types,
    ],
    [
        'Social' => $social_types,
    ],
    [
        'Other' => $other_types,
    ]
);

return $link_type_options;
<?php
/**
 * Memberpress Integrations
 * 
 *
 */

// Mailchimp Integration
// When a subscriber's data is synced, manually set the "Is Website Member"
// field to 1 (true). This is to set this value for sub-accounts... otherwise the
// value is never set for subaccounts
function filter_mailchimp_sync_subscriber_data( $subscriber, $user ) { 
    $subscriber->merge_fields['WEBMEMBER'] = '1';
    return $subscriber;
};
add_filter( 'mailchimp_sync_subscriber_data', 'filter_mailchimp_sync_subscriber_data', 10, 2 ); 

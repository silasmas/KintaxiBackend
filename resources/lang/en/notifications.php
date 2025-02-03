<?php
/**
 * @author Xanders
 * @see https://team.xsamtech.com/xanderssamoth
 */

return [

    /*
    |--------------------------------------------------------------------------
    | Notifications Language Lines
    |--------------------------------------------------------------------------
    |
    */

    // ===== ERROR PAGES
    // 400
    '400_title' => 'Bad request',
    '400_description' => 'Verify your request please!',
    // 401
    '401_title' => 'Unauthorized',
    '401_description' => 'You have not authorization for this request',
    // 403
    '403_title' => 'Forbidden space',
    '403_description' => 'This space is not allowed',
    // 404
    '404_title' => 'Page not found',
    '404_description' => 'The page you are looking for does not exist',
    // 405
    '405_title' => 'Method not allowed',
    '405_description' => 'Your request is sent with a bad method',
    // 419
    '419_title' => 'Page expired',
    '419_description' => 'The page maked long time without activity',
    // 500
    '500_title' => 'Internal error',
    '500_description' => 'Our server meets a problem. Please retry after some minutes!',
    // Others
    'expects_json' => 'The current request probably expects a JSON response.',

    // ===== ALERTS
    'no_record' => 'There is no recording!',
    'create_error' => 'The creation failed!',
    'update_error' => 'The change failed!',
    'registered_data' => 'Data registered',
    'required_fields' => 'Please check the required fields',
    'transaction_waiting' => 'Please confirm the message from your operator on your phone. Then press the button below.',
    'transaction_done' => 'Your transaction is complete!',
    'transaction_failed' => 'Failed to send your payment.',
    'transaction_request_failed' => 'An error occurred while processing your request.',
    'transaction_push_failed' => 'Unable to process request, please try again. Push sending failed',
    'transaction_type_error' => 'Please select transaction type',
    'new_partner_message' => 'You can now log in as a partner with your phone number. Temporary password:',
    // Group
    'find_all_groups_success' => 'Groups found',
    'find_group_success' => 'Group found',
    'find_group_404' => 'Group not found',
    'create_group_success' => 'Group created',
    'update_group_success' => 'Group updated',
    'delete_group_success' => 'Group deleted',
    // Status
    'find_all_statuses_success' => 'Statuses found',
    'find_status_success' => 'Status found',
    'find_status_404' => 'Status not found',
    'create_status_success' => 'Status created',
    'update_status_success' => 'Status updated',
    'delete_status_success' => 'Status deleted',
    // Type
    'find_all_types_success' => 'Types found',
    'find_type_success' => 'Type found',
    'find_type_404' => 'Type not found',
    'create_type_success' => 'Type created',
    'update_type_success' => 'Type updated',
    'delete_type_success' => 'Type deleted',
    // Category
    'find_all_categories_success' => 'Categories found',
    'find_category_success' => 'Category found',
    'find_category_404' => 'Category not found',
    'create_category_success' => 'Category created',
    'update_category_success' => 'Category updated',
    'delete_category_success' => 'Category deleted',
    // Country
    'find_all_countries_success' => 'Countries found',
    'find_country_success' => 'Country found',
    'find_country_404' => 'Country not found',
    'create_country_success' => 'Country created',
    'update_country_success' => 'Country updated',
    'delete_country_success' => 'Country deleted',
    // Partner
    'find_all_partners_success' => 'Partners found',
    'find_partner_success' => 'Partner found',
    'find_partner_404' => 'Partner not found',
    'create_partner_success' => 'Partner created',
    'update_partner_success' => 'Partner updated',
    'delete_partner_success' => 'Partner deleted',
    // Work
    'find_all_works_success' => 'Works found',
    'find_work_success' => 'Work found',
    'find_work_404' => 'Work not found',
    'create_work_success' => 'Work created',
    'update_work_success' => 'Work updated',
    'delete_work_success' => 'Work deleted',
    // File
    'find_all_files_success' => 'Files found',
    'find_file_success' => 'File found',
    'find_file_404' => 'File not found',
    'create_file_success' => 'File created',
    'update_file_success' => 'File updated',
    'delete_file_success' => 'File deleted',
    // Subscription
    'find_all_subscriptions_success' => 'Subscriptions found',
    'find_subscription_success' => 'Subscription found',
    'find_subscription_404' => 'Subscription not found',
    'create_subscription_success' => 'Subscription created',
    'update_subscription_success' => 'Subscription updated',
    'delete_subscription_success' => 'Subscription deleted',
    'invalidate_subscription_failed' => 'Subscription still valid',
    // Cart
    'find_all_carts_success' => 'Carts found',
    'find_cart_success' => 'Cart found',
    'find_cart_404' => 'Cart not found',
    'create_cart_success' => 'Cart created',
    'update_cart_success' => 'Cart updated',
    'delete_cart_success' => 'Cart deleted',
    // Role
    'find_all_roles_success' => 'Roles found',
    'find_role_success' => 'Role found',
    'find_role_404' => 'Role not found',
    'create_role_success' => 'Role created',
    'update_role_success' => 'Role updated',
    'delete_role_success' => 'Role deleted',
    // User
    'find_all_users_success' => 'Users found',
    'find_user_success' => 'User found',
    'find_api_token_success' => 'API token found',
    'find_user_404' => 'User not found',
    'find_concerned_404' => 'Concerned not found',
    'find_visitor_404' => 'Visitor not found',
    'create_user_success' => 'User created',
    'login_user_success' => 'You are connected',
    'create_user_SMS_failed' => 'There is a problem with the SMS service',
    'update_user_success' => 'User updated',
    'update_password_success' => 'Password updated',
    'confirm_password_error' => 'Please confirm your password',
    'confirm_new_password' => 'Please confirm the new password',
    'delete_user_success' => 'User deleted',
    // PasswordReset
    'find_all_password_resets_success' => 'Passwords resets found',
    'find_password_reset_success' => 'Password reset found',
    'find_password_reset_404' => 'Password reset not found',
    'create_password_reset_success' => 'Password reset created',
    'update_password_reset_success' => 'Password reset updated',
    'delete_password_reset_success' => 'Password reset deleted',
    'unverified_token' => 'The OTP code is not yet verified',
    'bad_token' => 'The OTP code does not match',
    'token_label' => 'Your OTP code:',
    // PersonalAccessToken
    'find_all_personal_access_tokens_success' => 'Personal tokens found',
    'find_personal_access_token_success' => 'Personal token found',
    'find_personal_access_token_404' => 'Personal token not found',
    'create_personal_access_token_success' => 'Personal token created',
    'update_personal_access_token_success' => 'Personal token updated',
    'delete_personal_access_token_success' => 'Personal token deleted',
    // Notification
    'find_all_notifications_success' => 'Notifications found',
    'find_notification_success' => 'Notification found',
    'find_notification_404' => 'Notification not found',
    'create_notification_success' => 'Notification created',
    'update_notification_success' => 'Notification updated',
    'delete_notification_success' => 'Notification deleted',
    // Session
    'find_all_sessions_success' => 'Sessions found',
    'find_session_success' => 'Session found',
    'find_session_404' => 'Session not found',
    'create_session_success' => 'Session created',
    'update_session_success' => 'Session updated',
    'delete_session_success' => 'Session deleted',
    // Payment
    'find_all_payments_success' => 'Payments found',
    'find_payment_success' => 'Payment found',
    'find_payment_404' => 'Payment not found',
    'processing_succeed' => 'Your transaction succeeded. You can see it at your payments list.',
    'error_while_processing' => 'An error while processing your request',
    'process_failed' => 'Unable to process the request, please try again',
    'process_canceled' => 'You canceled your transaction',
    'create_payment_success' => 'Payment created',
    'update_payment_success' => 'Payment updated',
    'delete_payment_success' => 'Payment deleted',
    // Ride
    'find_all_rides_success' => 'Rides found',
    'find_ride_success' => 'Ride found',
    'find_ride_404' => 'Ride not found',
    'create_ride_success' => 'Ride created',
    'update_ride_success' => 'Ride updated',
    'delete_ride_success' => 'Ride deleted',

    // ===== PUBLIC NOTIFICATIONS
    // Partnership
    'one_partner' => '<strong><a href="/:from_username">:from_user_names</a></strong> is now your partner.',
    'two_partners' => '<strong><a href="/:from_username">:from_user_names</a></strong> and another person are now your partners.',
    'many_partners' => '<strong><a href="/:from_username">:from_user_names</a></strong> and :requests_count others are now your partners.',
    // Sponsoring
    'one_sponsoring_act' => '<strong><a href="/:from_username">:from_user_names</a></strong> just sponsored you.',
    'two_sponsoring_acts' => '<strong><a href="/:from_username">:from_user_names</a></strong> and another person just sponsored you.',
    'many_sponsoring_acts' => '<strong><a href="/:from_username">:from_user_names</a></strong> and :requests_count others just sponsored you.',
    // Consulting
    'one_consulting_act' => '<strong><a href="/:from_username">:from_user_names</a></strong> just consulted your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    'two_consulting_acts' => '<strong><a href="/:from_username">:from_user_names</a></strong> and another person just consulted your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    'many_consulting_acts' => '<strong><a href="/:from_username">:from_user_names</a></strong> and :requests_count others just consulted your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    // Subscriptions
    'one_subscription' => '<strong><a href="/:from_username">:from_user_names</a></strong> subscribed to your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    'two_subscriptions' => '<strong><a href="/:from_username">:from_user_names</a></strong> and another person subscribed to your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    'many_subscriptions' => '<strong><a href="/:from_username">:from_user_names</a></strong> and :requests_count others subscribed to your <strong><a href="/:to_username/works/:work_id">:work_type</a></strong>.',
    // Payment
    'payment_done' => 'You have made a payment with code <strong>:code</strong>. Please click here for payment details.',
    // Miscellaneous
    'welcome' => 'Welcome <strong><a href="/users/:to_user_id">:to_user_names</a></strong>. Click here to read our terms of use.',
    'welcome_back' => 'Welcome back <strong><a href="/users/:to_user_id">:to_user_names</a></strong>. Click here to see what\'s new in the plateform.',
];

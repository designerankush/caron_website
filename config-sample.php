<?php
// config-sample.php (DUMMY VALUES) - commit this file

return [
  'app' => [
    'base_url' => 'https://www.example.com',
    'env'      => 'production',
  ],

  'mail' => [
    'driver'     => 'ses',
    'host'       => 'email-smtp.ap-south-1.amazonaws.com',
    'port'       => 587,
    'username'   => 'YOUR_SES_SMTP_USERNAME',
    'password'   => 'YOUR_SES_SMTP_PASSWORD',
    'encryption' => 'tls',
    'from_email' => 'verified@example.com',
    'from_name'  => 'Your Brand',
    'reply_to'   => 'verified@example.com',
    // Careers form recipient
    'careers_to_email' => 'verified@example.com',
    'careers_to_name'  => 'Your Brand',

    // Optional BCC list (array OR comma-separated string)
    'careers_bcc' => [
      // 'someone@example.com'
    ],
  ],
];

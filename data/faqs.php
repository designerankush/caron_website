<?php
/**
 * data/faqs.php
 * Return FAQ categories + questions/answers
 */

return [
  [
    'slug'  => 'service-related-faqs',
    'title' => 'Service',
    'items' => [
      [
        'q' => 'What services does Caron Infotech provide?',
        'a' => 'Caron Infotech offers end-to-end software development services including SaaS development, web development, mobile app development, UI/UX design, blockchain solutions, and custom IT consulting.',
      ],
      [
        'q' => 'Do you develop custom software solutions?',
        'a' => 'Yes, we specialize in custom software development tailored to your business needs, industry requirements, and long-term scalability goals.',
      ],
      [
        'q' => 'Can you help startups build SaaS products?',
        'a' => 'Absolutely. We work with startups and entrepreneurs to design, develop, and launch scalable SaaS platforms from idea to deployment.',
      ],
      [
        'q' => 'Do you provide mobile app development services?',
        'a' => 'Yes, we build high-performance Android, iOS, and cross-platform mobile applications with modern UI and secure backend integration.',
      ],
      [
        'q' => 'Which industries do you serve?',
        'a' => 'We serve multiple industries including healthcare, fintech, eCommerce, education, logistics, real estate, and enterprise technology.',
      ],
    ],
  ],

  [
    'slug'  => 'pricing-faqs',
    'title' => 'Pricing',
    'items' => [
      [
        'q' => 'How much does a software development project cost?',
        'a' => 'Project cost depends on the scope, features, technology stack, and timeline. We provide flexible pricing models based on your business requirements.',
      ],
      [
        'q' => 'Do you offer fixed-price and hourly pricing options?',
        'a' => 'Yes, we offer both fixed-price packages and hourly engagement models depending on the type and complexity of the project.',
      ],
      [
        'q' => 'Can I get a free project estimate?',
        'a' => 'Yes, Caron Infotech provides a free consultation and project estimate after understanding your requirements.',
      ],
      [
        'q' => 'Are there any hidden charges?',
        'a' => 'No. We follow transparent pricing with clear documentation and milestone-based billing.',
      ],
    ],
  ],

  [
    'slug'  => 'project-delivery-faqs',
    'title' => 'Project Delivery',
    'items' => [
      [
        'q' => 'How long does it take to complete a project?',
        'a' => 'Project timelines vary based on complexity. A typical web or SaaS MVP can take 6–12 weeks, while larger systems may take longer.',
      ],
      [
        'q' => 'How do you ensure on-time delivery?',
        'a' => 'We follow agile development methodology, weekly progress updates, milestone planning, and dedicated project management for timely delivery.',
      ],
      [
        'q' => 'Will I receive regular project updates?',
        'a' => 'Yes, we provide weekly reports, sprint reviews, and communication through tools like Slack, Zoom, Jira, or Trello.',
      ],
      [
        'q' => 'Do you offer post-launch support?',
        'a' => 'Yes, we provide ongoing maintenance, support, and feature upgrades after project delivery.',
      ],
    ],
  ],

  [
    'slug'  => 'documentation-faqs',
    'title' => 'Documentation',
    'items' => [
      [
        'q' => 'Do you provide complete project documentation?',
        'a' => 'Yes, we provide full technical documentation including requirements, architecture, APIs, user manuals, and deployment guides.',
      ],
      [
        'q' => 'Will the source code belong to me?',
        'a' => 'Yes, once the project is completed and payment terms are fulfilled, the complete source code and ownership rights are transferred to you.',
      ],
      [
        'q' => 'Do you sign NDA agreements for confidentiality?',
        'a' => 'Yes, we can sign NDAs to ensure your project idea, data, and business information remain secure and confidential.',
      ],
    ],
  ],

  // Optional: callout section (not an accordion)
  [
    'slug'  => 'need-more-help',
    'title' => 'Need More Help?',
    'items' => [],
    'note'  => [
      'If you still have questions, feel free to contact our team anytime.',
      'We’re happy to assist you with your next software project.',
    ],
  ],
];

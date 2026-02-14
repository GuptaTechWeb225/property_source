<?php

namespace Modules\Mailbox\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Mailbox\Entities\MailboxTemplate;

class MailboxTemplateSeeder extends Seeder
{
    public function run()
    {
        MailboxTemplate::create([
            'title' => 'Template Title 1',
            'slug' => 'template-1',
            'description' => 'Description for Template 1',
            'is_public' => 1,
        ]);

        MailboxTemplate::create([
            'title' => 'Template Title 2',
            'slug' => 'template-2',
            'description' => 'Description for Template 2',
            'is_public' => 0,
        ]);

        MailboxTemplate::create([
            'title' => 'Template Title 3',
            'slug' => 'template-3',
            'description' => 'Description for Template 3',
            'is_public' => 1,
        ]);
    }
}

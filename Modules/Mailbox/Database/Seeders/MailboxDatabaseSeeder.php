<?php

namespace Modules\Mailbox\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Mailbox\Entities\Mailbox;
use Illuminate\Database\Eloquent\Model;
use Modules\Mailbox\Entities\MailboxRecipient;

class MailboxDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        $status = ['sent'];

        for ($i = 1; $i <= 10; $i++) {
            $randomKey = array_rand($status);
            $randomValue = $status[$randomKey];
            Mailbox::create([
                'subject'       => 'This email for ' . $i,
                'message'       => $i . ' - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum, ratione.',
                'status'        => $randomValue,
                'is_important'  => rand(0,1),
                'is_starred'    => 1,
                'created_by'    => 1,
            ]);
        }

        $users = User::get();
        foreach ($users as $item) {
            MailboxRecipient::create([
                'mailbox_id'    => rand(1,10),
                'user_id'       => $item->id,
                'email'         => $item->email
            ]);
        }
    }
}

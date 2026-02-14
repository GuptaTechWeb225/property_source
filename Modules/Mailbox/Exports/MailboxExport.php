<?php
namespace Modules\Mailbox\Exports;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class MailboxExport implements FromCollection, WithMapping, WithHeadings
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function collection()
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'SL',
            'Subject',
            'Message',
            'Created at',
        ];
    }

    public function map($mailbox): array
    {
        return [
            $mailbox->id,
            $mailbox->subject,
            $mailbox->message,
            $mailbox->created_at,
        ];
    }
}

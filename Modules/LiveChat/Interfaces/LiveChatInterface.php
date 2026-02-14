<?php

namespace Modules\LiveChat\Interfaces;

interface LiveChatInterface
{
    public function model();

    public function store($request);

    public function update($request);

    public function readMessages($id);
}

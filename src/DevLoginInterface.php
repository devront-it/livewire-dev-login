<?php

namespace Devront\DevLogin;

interface DevLoginInterface
{
    public function getDevLoginLabel(): string;

    public function getRedirectUrlAfterDevLogin(): string;
}

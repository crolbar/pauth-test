<?php

$users = [
    "admin" => password_hash("admin", PASSWORD_DEFAULT),
    "crolbar" => password_hash("yo", PASSWORD_ARGON2I),
];

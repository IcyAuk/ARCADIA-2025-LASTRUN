<?php

namespace App\Interface;
defined('ROOTPATH') OR exit('Access Denied!');
interface ISession
{
    public function set(mixed $keyOrArray, mixed $value = ''): int;
    public function get(string $key, mixed $default = ''): mixed;
    public function auth(mixed $user_row): int;
    public function logout(): int;
    public function is_logged_in(): bool;
    public function user(string $key = '', mixed $default = ''): mixed;
    public function pop(string $key, mixed $default = ''): mixed;
    public function all(): mixed;
}
<?php
function tagArr($key = 0)
{
    $tags = ['btn-primary', 'btn-secondary', 'btn-success', 'btn-danger', 'btn-warning', 'btn-info', 'btn-light', 'btn-dark'];
    return $tags[$key] ?? '';
}
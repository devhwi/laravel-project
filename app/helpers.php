<?php

function markdown($text) {
    return app(Parsedown::class)->text($text);
}
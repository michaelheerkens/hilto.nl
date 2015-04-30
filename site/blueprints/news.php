<?php if(!defined('KIRBY')) exit ?>

title: News
pages: true
files: true
fields:
  title:
    label: Title
    type:  text
    required: true
  text:
    label: Text
    type:  textarea
    required: true
  date:
    label: Date
    type: date
    format: DD/MM/YYYY
    required: true
    default: today

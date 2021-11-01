<?php

return [
    'actions'       => [
        'add_epoch'         => 'Add an epoch',
        'add_intercalary'   => 'Add intercalary days',
        'add_month'         => 'Add a month',
        'add_moon'          => 'Add a moon',
        'add_reminder'      => 'Add a reminder',
        'add_season'        => 'Add a season',
        'add_weather'       => 'Set weather effect',
        'add_week'          => 'Add a named week',
        'add_weekday'       => 'Add a week day',
        'add_year'          => 'Add a year name',
        'set_today'         => 'Set as current day',
        'today'             => 'Today',
    ],
    'checkboxes'    => [
        'is_recurring'  => 'Takes place every year',
    ],
    'create'        => [
        'description'   => 'Create a new calendar',
        'success'       => 'Calendar \':name\' created.',
        'title'         => 'New Calendar',
    ],
    'destroy'       => [
        'success'   => 'Calendar \':name\' removed.',
    ],
    'edit'          => [
        'description'   => 'Update the calendar',
        'success'       => 'Calendar \':name\' updated.',
        'title'         => 'Edit Calendar :name',
        'today'         => 'Calendar date updated.',
    ],
    'event'         => [
        'actions'   => [
            'delete-confirm'    => 'this reminder',
            'existing'          => 'Existing Entity',
            'new'               => 'New Event',
            'switch'            => 'Change choice',
        ],
        'create'    => [
            'description'   => 'Create a calendar event',
            'success'       => 'Calendar event created.',
            'title'         => 'Add a Calendar Event to :name',
        ],
        'destroy'   => 'Reminder removed from calendar \':name\'.',
        'edit'      => [
            'success'   => 'Reminder updated.',
            'title'     => 'Update Reminder for :name',
        ],
        'helpers'   => [
            'add'               => 'Add an existing event to this calendar.',
            'new'               => 'Or create a new event by simply providing a name.',
            'other_calendar'    => 'You are editing a reminder that is on the :calendar calendar.',
        ],
        'modal'     => [
            'title' => 'Add an event to the calendar',
        ],
        'success'   => 'Reminder \':event\' added to the calendar.',
    ],
    'events'        => [
        'description'   => 'Events in this calendar.',
        'title'         => 'Calendar :name Events',
    ],
    'fields'        => [
        'calendar'              => 'Parent Calendar',
        'calendars'             => 'Calendars',
        'colour'                => 'Colour',
        'comment'               => 'Comment',
        'current_day'           => 'Current Day',
        'current_month'         => 'Current Month',
        'current_year'          => 'Current Year',
        'date'                  => 'Current Date',
        'has_leap_year'         => 'Has leap years',
        'intercalary'           => 'Intercalary Days',
        'is_incrementing'       => 'Advancing Date',
        'is_recurring'          => 'Recurring',
        'leap_year_amount'      => 'Add Days',
        'leap_year_month'       => 'Month',
        'leap_year_offset'      => 'Every',
        'leap_year_start'       => 'Leap Year',
        'length'                => 'Event Length',
        'length_days'           => ':count day|:count days',
        'months'                => 'Months',
        'moons'                 => 'Moons',
        'name'                  => 'Name',
        'parameters'            => 'Parameters',
        'recurring_periodicity' => 'Recurring Periodicity',
        'recurring_until'       => 'Recurring Until Year',
        'reset'                 => 'Weekly Reset',
        'seasons'               => 'Seasons',
        'start_offset'          => 'Start Offset',
        'suffix'                => 'Suffix',
        'type'                  => 'Type',
        'week_names'            => 'Week Names',
        'weekdays'              => 'Week Days',
    ],
    'helpers'       => [
        'month_type'    => 'Intercalary months don\'t use week days, but still influence moons and seasons.',
        'nested_parent' => 'Displaying the calendars of :parent.',
        'nested_without'=> 'Displaying all calendars that don\'t have a parent calendar. Click on a row to see the children calendars.',
        'start_offset'  => 'By default, the calendar starts on the first weekday of year 0. Changing this field influences where the calendar\'s first day is placed.',
    ],
    'hints'         => [
        'event_length'      => 'How long an event is set to last. An event can\'t span over more than two months.',
        'intercalary'       => 'Days that fall outside of the standard months and weeks. They don\'t influence week days but influence moon cycles.',
        'is_incrementing'   => 'Advancing calendars will automatically have their current date incremented at 00:00 UTC.',
        'is_recurring'      => 'An event can be set to recurring. It will reappear every year on the same date.',
        'months'            => 'Your calendar should have at least 2 months.',
        'moons'             => 'Adding moons will make them show up in the calendar on every full and new moon. If the full moon period is bigger than 10 days, waning and waxing moons will also be displayed.',
        'parent_calendar'   => 'Giving the calendar a parent calendar will include the reminders and weather effects of the parent calendar.',
        'reset'             => 'Always start the beginning of the month or year on the first week day.',
        'seasons'           => 'Create seasons for your calendar by providing when each of them start. Kanka will take care of the rest.',
        'weekdays'          => 'Set your weekday names. At least 2 weekdays are required.',
        'weeks'             => 'Define some names for the more important weeks of your calendar.',
        'years'             => 'Some years are so important that they have their own name.',
    ],
    'index'         => [
        'add'           => 'New Calendar',
        'description'   => 'Manage the calendars of :name.',
        'header'        => 'Calendars of :name',
        'title'         => 'Calendars',
    ],
    'layouts'       => [
        'month' => 'Month',
        'year'  => 'Year',
    ],
    'modals'        => [
        'switcher'  => [
            'title' => 'Year Switcher',
        ],
    ],
    'month_types'   => [
        'intercalary'   => 'Intercalary',
        'standard'      => 'Standard',
    ],
    'options'       => [
        'events'    => [
            'recurring_periodicity' => [
                'fullmoon'      => 'Full moon',
                'fullmoon_name' => ':moon full moon',
                'month'         => 'Monthly',
                'newmoon'       => 'New moon',
                'newmoon_name'  => ':moon new moon',
                'none'          => 'None',
                'unnamed_moon'  => 'Moon :number',
                'year'          => 'Yearly',
            ],
        ],
        'resets'    => [
            ''      => 'None',
            'month' => 'Monthly',
            'year'  => 'Yearly',
        ],
    ],
    'panels'        => [
        'intercalary'   => 'Intercalary Days',
        'leap_year'     => 'Leap Year',
        'months'        => 'Months',
        'weeks'         => 'Weeks',
        'years'         => 'Named Years',
    ],
    'parameters'    => [
        'intercalary'   => [
            'length'    => 'Duration in days',
            'month'     => 'At the end of which month',
            'name'      => 'Name of intercalation',
        ],
        'month'         => [
            'alias' => 'Month Alias',
            'length'=> 'Days',
            'name'  => 'Month Name',
            'type'  => 'Type',
        ],
        'moon'          => [
            'fullmoon'  => 'Full moon every (days)',
            'name'      => 'Moon Name',
            'offset'    => 'First full moon offset',
        ],
        'seasons'       => [
            'day'   => 'Day start',
            'month' => 'Month start',
            'name'  => 'Season Name',
        ],
        'weeks'         => [
            'name'      => 'Week Name',
            'number'    => 'Number',
        ],
        'year'          => [
            'name'      => 'Year Name',
            'number'    => 'Year',
        ],
    ],
    'placeholders'  => [
        'colour'            => 'Colour',
        'comment'           => 'Birthday, festival, solstice',
        'date'              => 'The current date',
        'leap_year_amount'  => 'Number of days added on a leap year',
        'leap_year_month'   => 'Month on which days are added',
        'leap_year_offset'  => 'Every how many years is a leap year',
        'leap_year_start'   => 'First year that is a leap year',
        'length'            => 'Event length in days',
        'months'            => 'Number of months in a year',
        'name'              => 'Name of the calendar',
        'recurring_until'   => 'Last recurring year (leave empty for forever recurring)',
        'seasons'           => 'Number of seasons',
        'suffix'            => 'Current Era suffix (AC, BC)',
        'type'              => 'Type of the calendar',
        'weekdays'          => 'Number of days in a week',
    ],
    'show'          => [
        'description'       => 'A detailed view of a calendar',
        'missing_details'   => 'This calendar couldn\'t be displayed. Calendars need at least 2 months and 2 weekdays to render properly.',
        'moon_full_moon'    => ':moon Full Moon',
        'moon_new_moon'     => ':moon New Moon',
        'moon_waning_moon'  => ':moon Waning',
        'moon_waxing_moon'  => ':moon Waxing',
        'tabs'              => [
            'events'        => 'Reminders',
            'information'   => 'Information',
            'weather'       => 'Weather',
        ],
        'title'             => 'Calendar :name',
    ],
    'sorters'       => [
        'after' => 'Today & after',
        'before'=> 'Today & before',
    ],
];

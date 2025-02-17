<?php /** @var \Laravel\Cashier\Invoice $invoice */?>
@extends('layouts.app', [
    'title' => __('settings.invoices.title'),
    'description' => '',
    'breadcrumbs' => false,
    'sidebar' => 'settings',
    'noads' => true,
])

@section('content')
    @include('partials.errors')
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">
                {{ __('settings.invoices.title') }}
            </h3>
        </div>
        <div class="box-body">
            <p class="help-block">
                {!! __('settings.invoices.header') !!}
            </p>

            <table class="table table-default table-borderless table-hover">
                <thead>
                <tr>
                    <th>{{ __('settings.invoices.fields.date') }}</th>
                    <th>{{ __('settings.invoices.fields.amount') }}</th>
                    <th>{{ __('settings.invoices.fields.status') }}</th>
                    <th>{{ __('settings.invoices.fields.invoice') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                        <td>{{ $invoice->total() }}</td>
                        <td>{{ $invoice->paid ? __('settings.invoices.status.paid') : __('settings.invoices.status.pending') }}</td>
                        <td>
                            <a href="{{ route('settings.invoices.download', ['invoice' => $invoice->id]) }}">
                                <i class="fa-solid fa-download"></i> {{  __('settings.invoices.actions.download') }}
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

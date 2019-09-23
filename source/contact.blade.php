@extends('_layouts.master')

@php($contact = getenv('CONTACT_FORM') ?? getenv('CONTACT_FORM'))

@push('meta')
    <meta property="og:title" content="Contact {{ $page->siteName }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ $page->getUrl() }}"/>
    <meta property="og:description" content="Get in touch with {{ $page->siteName }}" />
@endpush

@section('body')
    <div class="page__hero">
        <div class="w-full block text-center mb-5">
            <h1 class="leading-none page__hero-title mx-auto mb-1 mt-0">Contact Me</h1>
            <h4 class="m-0 text-secondary">Leave a message, keep your spam</h4>
        </div>
    </div>
    <div class="md:-mt-20 bg-white px-8 mb-12 text-center rounded shadow-lg page__content">

    <form action="{!! $contact !!}" method="POST" class="mb-12 mt-3 max-w-xl mx-auto py-8 px-3">
        <div class="flex flex-wrap mb-6 -mx-3">
            <div class="w-full md:w-1/2 mb-6 md:mb-0 px-3">
                <label class="form__label" for="contact-name">
                    Name
                </label>

                <input
                    type="text"
                    id="contact-name"
                    placeholder="Jane Doe"
                    name="name"
                    class="form__input"
                    required
                >
            </div>

            <div class="w-full px-3 md:w-1/2">
                <label class="form__label" for="contact-email">
                    Email Address
                </label>

                <input
                    type="email"
                    id="contact-email"
                    placeholder="email@domain.com"
                    name="email"
                    class="form__input"
                    required
                >
            </div>
        </div>

        <div class="w-full mb-12">
            <label class="form__label" for="contact-message">
                Message
            </label>

            <textarea
                id="contact-message"
                rows="4"
                name="message"
                class="form__text"
                placeholder="A lovely message here."
                required
            ></textarea>
        
            @if(getenv('RECAPTCHA_SITE_KEY'))
                <div class="mt-6 g-recaptcha" id="g-recaptcha" data-sitekey="{{ getenv('RECAPTCHA_SITE_KEY') }}"></div>
            @endif
        </div>

        <div class="flex justify-end w-full">

            <input
                type="submit"
                value="Submit"
                class="btn"
            >
        </div>
    </form>
@stop

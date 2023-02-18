<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .bg-header {
                background-image: url(https://larajobs.com/img/bg-lara2.svg);
                background-repeat: round;
            }
        </style>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="flex flex-col items-center justify-center pt-12 pb-6 text-white bg-header bg-pattern sm:items-center py-4 sm:pt-0">
            <div class="flex justify-center pt-4 sm:justify-center sm:pt-0">
                <img src="{{ asset('frontend/assets/imgs/yolo-default.png') }}" alt="You only live one!" width="240px" height="240px">
            </div>
        </div>
        <div class="main">
            <section id="services" class="bg-gray-100 py-16 lg:py-24">
                <div class="max-w-screen-xl mx-auto px-8">
                    <h2 class="text-center text-4xl text-gray-800 font-semibold">How We Can Help</h2>
                    <p class="mt-4 text-xl text-center max-w-3xl mx-auto text-gray-700">Whether you need more man-power, a web app built from scratch, or just a second set of eyes, we're here to help.</p>
                    <div class="mt-12 -mx-6 flex flex-col space-y-8 lg:flex-row lg:space-y-0">
                        <div class="block px-6 flex-1 text-center lg:text-left">
                            <svg class="inline-block text-blue-700 w-12" aria-label="cloud icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path></svg>
                            <h3 class="mt-4 font-semibold text-2xl text-gray-800">Web Applications</h3>
                            <p class="mt-2 text-lg text-gray-700">We can work with you to build a custom web app from scratch. You have the idea - we have the skills to build it.</p>
                        </div>
                        <div class="block px-6 flex-1 text-center lg:text-left">
                            <svg class="inline-block text-blue-700 w-12" aria-label="team icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            <h3 class="mt-4 font-semibold text-2xl text-gray-800">Extend Your Team</h3>
                            <p class="mt-2 text-lg text-gray-700">We can help extend your team by filling specific functions within the team, helping you complete your projects faster.</p>
                        </div>
                        <div class="block px-6 flex-1 text-center lg:text-left">
                            <svg class="inline-block text-blue-700 w-12" aria-label="shield check icon" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            <h3 class="mt-4 font-semibold text-2xl text-gray-800">Advisement</h3>
                            <p class="mt-2 text-lg text-gray-700">Not sure if you're doing things the right way? We can come in and make sure you're on the right track.</p>
                        </div>
                    </div>
                    <div class="mt-12 flex flex-wrap items-center justify-center mx-auto text-center text-lg">
                        <span class="mx-4 mb-2 text-gray-800">Frontend/UI/UX</span>
                        <span class="block leading-none mt-2">˙</span>
                        <span class="mx-4 mb-2 text-gray-800">Backend/APIs</span>
                        <span class="block leading-none mt-2">˙</span>
                        <span class="mx-4 mb-2 text-gray-800">Project Management</span>
                        <span class="block leading-none mt-2">˙</span>
                        <span class="mx-4 mb-2 text-gray-800">Auditing</span>
                    </div>
                </div>
            </section>
            <section id="tech" class="py-16 lg:py-24">
                <div class="max-w-screen-xl mx-auto px-8">
                    <h2 class="text-center text-4xl text-gray-800 font-semibold">Tools We Love</h2>
                    <p class="mt-4 text-xl text-center max-w-3xl mx-auto text-gray-700">We love using tools that are powerful and secure while enabling us to be extremely productive. Some of our favorite frameworks and tools are listed below.</p>
                    <div class="mt-12 -mx-6 flex flex-col space-y-8 lg:flex-row lg:space-y-0">
                        <a href="https://laravel.com" target="_blank" rel="noopener" class="block mb-8 px-6 flex-1 text-center lg:text-left transition-opacity duration-200 hover:opacity-75">
                            <svg class="w-16 h-16 inline-block" viewBox="0 0 50 52"><path d="M49.63 11.56a.8.8 0 01.02.21v10.97a.8.8 0 01-.4.7l-9.2 5.3v10.51a.8.8 0 01-.4.7L20.41 51c-.04.03-.1.04-.14.06l-.05.02a.8.8 0 01-.41 0c-.03 0-.05-.02-.07-.03l-.13-.05L.4 39.94a.8.8 0 01-.4-.69V6.33c0-.07.01-.14.03-.2 0-.03.02-.05.03-.07l.05-.13.05-.07.07-.1.08-.05.09-.07L10.01.11a.8.8 0 01.8 0l9.61 5.53.1.07.07.06.07.1.05.06c.03.04.04.09.06.13l.02.07a.8.8 0 01.03.2V26.9l8.01-4.6V11.76a.8.8 0 01.03-.2c0-.03.02-.05.03-.07l.05-.13.05-.07.07-.1.08-.05.1-.07 9.6-5.53a.8.8 0 01.8 0l9.61 5.53.1.07.07.06.07.1.06.06.05.13.03.06zm-1.58 10.72v-9.12l-3.36 1.93-4.65 2.68v9.12l8.01-4.6zm-9.6 16.5v-9.12l-4.58 2.6-13.05 7.45v9.22L38.44 38.8zM1.6 7.73v31.07l17.62 10.14v-9.21l-9.2-5.21H10l-.09-.07-.07-.06-.07-.09-.06-.08-.04-.1-.04-.09-.02-.12-.01-.09V12.33L4.97 9.65 1.6 7.72zm8.81-6l-8 4.61 8 4.61 8-4.6-8-4.62zm4.17 28.77l4.64-2.67V7.71l-3.36 1.94-4.65 2.67v20.1l3.37-1.94zM39.24 7.16l-8 4.61 8 4.61 8-4.6-8-4.62zm-.8 10.6L33.8 15.1l-3.37-1.93v9.12l4.65 2.68 3.36 1.93v-9.12zM20.02 38.34l11.74-6.7 5.87-3.35-8-4.61-9.2 5.3-8.4 4.84 7.99 4.52z" fill="#FF2D20" fill-rule="evenodd"></path></svg>
                            <h3 class="font-semibold text-2xl text-gray-800 mt-4">Laravel</h3>
                            <p class="mt-2 text-lg text-gray-700">Laravel is a modern PHP framework made for building powerful web application backends and APIs.</p>
                        </a>
                        <a href="https://laravel-livewire.com" target="_blank" rel="noopener" class="block mb-8 px-6 flex-1 text-center lg:text-left transition-opacity duration-200 hover:opacity-75">
                            <svg class="w-16 h-16 inline-block" viewBox="0 0 44 51" fill="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M41.76 33.25c-.82 1.23-1.43 2.75-3.1 2.75-2.78 0-2.94-4.3-5.73-4.3-2.8 0-2.64 4.3-5.43 4.3-2.8 0-2.94-4.3-5.74-4.3-2.8 0-2.64 4.3-5.43 4.3-2.8 0-2.94-4.3-5.74-4.3-2.79 0-2.64 4.3-5.43 4.3-.88 0-1.5-.43-2.01-1C1.15 31.51 0 27.43 0 23.08 0 10.34 9.85 0 22 0s22 10.34 22 23.09c0 3.64-.8 7.1-2.24 10.16z" fill="#FB70A9"></path><mask id="a" maskUnits="userSpaceOnUse" x="7" y="27" width="29" height="24"><path d="M13.21 30.97v9.56a3.1 3.1 0 01-6.21 0V28.99C7.58 27.92 8.24 27 9.44 27c1.94 0 2.62 2.44 3.77 3.97zm11.74.5v15.12a3.45 3.45 0 01-6.9 0V29.47c.65-1.25 1.32-2.47 2.7-2.47 2.17 0 2.76 3.06 4.2 4.47zM36 31.19v10.98a3.1 3.1 0 01-6.21 0v-13.5c.54-.92 1.18-1.67 2.26-1.67 2.04 0 2.68 2.7 3.95 4.19z" fill="#fff"></path></mask><g mask="url(#a)"><path d="M13.21 30.97v9.56a3.1 3.1 0 01-6.21 0V28.99C7.58 27.92 8.24 27 9.44 27c1.94 0 2.62 2.44 3.77 3.97zm11.74.5v15.12a3.45 3.45 0 01-6.9 0V29.47c.65-1.25 1.32-2.47 2.7-2.47 2.17 0 2.76 3.06 4.2 4.47zM36 31.19v10.98a3.1 3.1 0 01-6.21 0v-13.5c.54-.92 1.18-1.67 2.26-1.67 2.04 0 2.68 2.7 3.95 4.19z" fill="#4E56A6"></path></g><mask id="b" maskUnits="userSpaceOnUse" x="7" y="21" width="29" height="17"><path d="M13.21 33.9c-.55-.68-1.2-1.18-2.14-1.18-2.24 0-2.65 2.83-4.07 4.1V24.64a3.1 3.1 0 016.21 0v9.26zm11.74.22c-.59-.79-1.27-1.4-2.32-1.4-2.49 0-2.72 3.5-4.58 4.46V31.8a3.45 3.45 0 016.9 0v2.32zm11.05-.6a2.47 2.47 0 00-1.8-.8c-2.41 0-2.7 3.28-4.41 4.37V26.15a3.1 3.1 0 016.21 0v7.36z" fill="#fff"></path></mask><g mask="url(#b)"><path d="M13.21 33.9c-.55-.68-1.2-1.18-2.14-1.18-2.24 0-2.65 2.83-4.07 4.1V24.64a3.1 3.1 0 016.21 0v9.26zm11.74.22c-.59-.79-1.27-1.4-2.32-1.4-2.49 0-2.72 3.5-4.58 4.46V31.8a3.45 3.45 0 016.9 0v2.32zm11.05-.6a2.47 2.47 0 00-1.8-.8c-2.41 0-2.7 3.28-4.41 4.37V26.15a3.1 3.1 0 016.21 0v7.36z" fill="#000" fill-opacity=".3"></path></g><path fill-rule="evenodd" clip-rule="evenodd" d="M41.76 33.25c-.82 1.23-1.43 2.75-3.1 2.75-2.78 0-2.94-4.3-5.73-4.3-2.8 0-2.64 4.3-5.43 4.3-2.8 0-2.94-4.3-5.74-4.3-2.8 0-2.64 4.3-5.43 4.3-2.8 0-2.94-4.3-5.74-4.3-2.79 0-2.64 4.3-5.43 4.3-.88 0-1.5-.43-2.01-1C1.15 31.51 0 27.43 0 23.08 0 10.34 9.85 0 22 0s22 10.34 22 23.09c0 3.64-.8 7.1-2.24 10.16z" fill="#FB70A9"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M37 35.54c5.77-8.58 5.91-18.09.45-28.54A23.03 23.03 0 0144 23.14c0 3.63-.83 7.06-2.32 10.12-.85 1.23-1.49 2.74-3.2 2.74a2.5 2.5 0 01-1.48-.46z" fill="#E24CA6"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M20.82 28.85c7.65 0 10.87-4.44 10.87-10.75C31.7 11.8 26.82 6 20.82 6c-6 0-10.87 5.8-10.87 12.1s3.22 10.75 10.87 10.75z" fill="#fff"></path><path d="M17.9 18.46c2.25 0 4.07-2.01 4.07-4.5 0-2.48-1.82-4.5-4.07-4.5s-4.08 2.02-4.08 4.5c0 2.49 1.83 4.5 4.08 4.5z" fill="#030776"></path><path d="M17.22 15c1.12 0 2.04-.93 2.04-2.08 0-1.14-.92-2.07-2.04-2.07-1.13 0-2.04.93-2.04 2.07 0 1.15.91 2.08 2.04 2.08z" fill="#fff"></path></svg>
                            <h3 class="font-semibold text-2xl text-gray-800 mt-4">Livewire</h3>
                            <p class="mt-2 text-lg text-gray-700">Livewire is an extension of Laravel that makes building dynamic interfaces simple, without leaving the comfort of Laravel.</p>
                        </a>
                        <a href="https://tailwindcss.com" target="_blank" rel="noopener" class="block mb-8 px-6 flex-1 text-center lg:text-left transition-opacity duration-200 hover:opacity-75">
                            <svg class="w-16 h-16 inline-block" fill="none" viewBox="0 0 54 33"><g clip-path="url(#prefix__clip0)"><path fill="#14B4C6" fill-rule="evenodd" d="M27 0c-7.2 0-11.7 3.6-13.5 10.8 2.7-3.6 5.85-4.95 9.45-4.05 2.05.51 3.52 2 5.15 3.65 2.64 2.69 5.7 5.8 12.4 5.8 7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.05-.51-3.52-2-5.15-3.65C36.76 3.1 33.7 0 27 0zM13.5 16.2C6.3 16.2 1.8 19.8 0 27c2.7-3.6 5.85-4.95 9.45-4.05 2.05.51 3.52 2 5.15 3.65 2.64 2.69 5.7 5.8 12.4 5.8 7.2 0 11.7-3.6 13.5-10.8-2.7 3.6-5.85 4.95-9.45 4.05-2.05-.51-3.52-2-5.15-3.65-2.64-2.69-5.7-5.8-12.4-5.8z" clip-rule="evenodd"></path></g><defs><clipPath id="prefix__clip0"><path fill="#fff" d="M0 0h54v32.4H0z"></path></clipPath></defs></svg>
                            <h3 class="font-semibold text-2xl text-gray-800 mt-4">Tailwind CSS</h3>
                            <p class="mt-2 text-lg text-gray-700">Tailwind CSS is a utility-first CSS framework providing a fast, maintainable set of tools to prototype and implement designs.</p>
                        </a>
                    </div>
                    <div class="mt-12 flex flex-wrap items-center justify-center mx-auto text-center text-lg">
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://aws.amazon.com/" target="_blank" rel="noopener">AWS</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://getbootstrap.com/" target="_blank" rel="noopener">Bootstrap</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://vuejs.org" target="_blank" rel="noopener">Vue.js</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://deployer.org/" target="_blank" rel="noopener">Deployer</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://phpunit.de" target="_blank" rel="noopener">PHPUnit</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://www.mysql.com" target="_blank" rel="noopener">MySQL</a>
                        <span class="block leading-none mt-2">˙</span>
                        <a class="mx-4 mb-2 text-gray-800 border-b transition-colors duration-200 hover:text-gray-900 hover:border-gray-500" href="https://www.postgresql.org/" target="_blank" rel="noopener">Postgresql</a>
                    </div>
                </div>
            </section>
        </div>
        <div class="flex flex-col items-center justify-center pt-12 pb-6 text-white bg-pattern sm:items-center py-4 sm:pt-0">
            <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                        <a href="{{ url('/shop') }}" class="ml-1 underline">
                            Shop
                        </a>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>

                        <a href="{{ route('login') }}" class="ml-1 underline">
                            Blog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

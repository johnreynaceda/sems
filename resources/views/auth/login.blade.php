<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <style>
            .custom-shape-divider-bottom-1688096384 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
}

.custom-shape-divider-bottom-1688096384 svg {
    position: relative;
    display: block;
    width: calc(151% + 1.3px);
    height: 66px;
}

.custom-shape-divider-bottom-1688096384 .shape-fill {
    fill: #EA5B31;
}
        </style>
        <!-- Scripts -->
        <style>[x-cloak] { display: none !important; }</style>
        @wireUiScripts  
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen relative">
            <div class="absolute top-0 right-0 left-0 bg-cover  w-full h-full overflow-hidden opacity-5">
                <x-svg.bg/>
              </div>
            <section class="relative overflow-hidden ">
                <div class="relative w-full mx-auto max-w-7xl">
                  <div class="relative flex flex-col w-full p-5 mx-auto lg:px-16 md:flex-row md:items-center md:justify-between md:px-6" x-data="{ open: false }">
                    <div class="flex flex-row items-end justify-between text-sm text-black lg:justify-start">
                      <img src="{{asset('images/logo.png')}}" class="h-10" alt="">
                      <span class="font-bold ml-2 text-gray-600 text-lg">ROCKFORT EDUCATIONAL INSTITUTE INC.</span>
                    </div>
                    {{-- <nav :class="{'flex': open, 'hidden': !open}" class="flex-col items-center flex-grow hidden md:flex md:flex-row md:justify-end md:pb-0 md:space-x-6">
                      <a class="py-2 text-sm font-medium text-black hover:text-black/50" href="#">Product</a>
                      <a class="py-2 text-sm font-medium text-black hover:text-black/50" href="#">Resources</a>
                      <a class="font-medium text-sm active:bg-fuchsia-50 active:text-black bg-indigo-50 focus-visible:outline-2 focus-visible:outline-fuchsia-50 focus-visible:outline-offset-2 focus:outline-none group hover:bg-[#0000ff]/5 hover:text-[#0000ff] justify-center px-6 py-2.5 rounded-xl text-indigo-600">Pricing</a>
                    </nav> --}}
                  </div>
                </div>
              </section>
              <section class="relative flex items-center w-full ">
                <div class="relative items-center w-full px-5 py-24 mx-auto lg:px-16 lg:py-36 max-w-7xl md:px-12">
                  <div class="relative flex-col items-start m-auto align-middle">
                    <div class="grid grid-cols-1 gap-6 lg:gap-24 lg:grid-cols-2">
                      <div class="relative items-center gap-12 m-auto lg:inline-flex">
                        <div class="max-w-xl text-center lg:text-left">
                          <div>
                            <p class="text-3xl font-bold md:text-6xl text-slate-900">
                              <span class="text-main font-bungee">SEM|s</span> 
                            </p>
                            <p class=" text-lg tracking-tight text-slate-500 ">
                              Sales & Expenses Management System v.1
                            </p>
                          </div>
                          <div class="flex flex-col items-center border-t border-main gap-3 mt-5 pt-5 lg:flex-row">
                            {{-- <a class="inline-flex items-center justify-center w-full px-6 py-4 text-center text-white duration-200 bg-indigo-500 border-2 border-indigo-500 focus:outline-none focus-visible:outline-black focus-visible:ring-black hover:bg-transparent hover:border-indigo-500 hover:text-indigo-500 lg:w-auto rounded-xl" href="#"><svg class="icon icon-tabler icon-tabler-brand-chrome" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                <circle cx="12" cy="12" r="9"></circle>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="12" x2="20.4" y1="9" y2="9"></line>
                                <line x1="12" x2="20.4" y1="9" y2="9" transform="rotate(120 12 12)"></line>
                                <line x1="12" x2="20.4" y1="9" y2="9" transform="rotate(240 12 12)"></line>
                              </svg>
                              <span class="ml-3">Add to Chrome</span></a> --}}
                              <div class="w-full">
                                <x-auth-session-status class="mb-4" :status="session('status')" />
                                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                                  @csrf
                                  <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-600">Email address</label>
                                    <div class="mt-2">
                                      <x-input icon="user" id="email" type="email" name="email" :value="old('email')" required
                                        autofocus autocomplete="username" />
                                    </div>
                                  </div>
                    
                                  <div>
                                    <label for="password" class="block text-sm font-medium leading-6 text-gray-600">Password</label>
                                    <div class="mt-2">
                                      <x-inputs.password icon="key" id="password" type="password" name="password" required
                                        autocomplete="current-password" />
                                    </div>
                                  </div>
                    
                                  <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                      <input id="remember-me" name="remember-me" type="checkbox"
                                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                      <label for="remember-me" class="ml-3 block text-sm leading-6 text-gray-700">Remember me</label>
                                    </div>
                    
                                    <div class="text-sm leading-6">
                                      <a href="#" class="font-semibold text-main hover:text-gray-500">Forgot password?</a>
                                    </div>
                                  </div>
                    
                                  <div>
                                    <button >
                                      <x-button type="submit" label="Sign In" class=" font-bold" orange right-icon="login" />
                                    </button>
                                  </div>
                                </form>
                              </div>
                          </div>
                          {{-- <div class="flex flex-col gap-3 mt-12 lg:flex-row divide-slate-400 lg:divide-x-2">
                            <div>
                              <div class="flex items-center justify-center gap-3 lg:justify-start">
                                <div class="flex gap-1">
                                  <svg class="w-4 h-4 text-yellow-400 icon icon-tabler fill-yellow-400 icon-tabler-star" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                  </svg>
                                  <svg class="w-4 h-4 text-yellow-400 icon icon-tabler fill-yellow-400 icon-tabler-star" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                  </svg>
                                  <svg class="w-4 h-4 text-yellow-400 icon icon-tabler fill-yellow-400 icon-tabler-star" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                  </svg>
                                  <svg class="w-4 h-4 text-yellow-400 icon icon-tabler fill-yellow-400 icon-tabler-star" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                  </svg>
                                  <svg class="w-4 h-4 text-yellow-400 icon icon-tabler fill-yellow-400 icon-tabler-star" fill="currentColor" stroke="currentColor" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 0h24v24H0z" fill="none" stroke="none"></path>
                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z"></path>
                                  </svg>
                                </div>
                                <span class="text-slate-500">Chrome store rating</span>
                              </div>
                            </div>
                            <div class="lg:pl-3">
                              <span><strong class="text-indigo-500">6000+</strong>
                                <span class="ml-3 text-slate-500">Satisfied users</span></span>
                            </div>
                          </div> --}}
                        </div>
                      </div>
                      <div class="block w-full mt-12 lg:mt-0">
                        {{-- <img alt="hero" class="object-cover object-center w-full mx-auto drop-shadow-xl lg:ml-auto rounded-2xl" src="https://leaddelta.com/wp-content/uploads/2022/12/home-hero.svg"> --}}
                        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" class="object-cover object-center  w-full mx-auto drop-shadow-xl lg:ml-auto rounded-2xl" viewBox="0 0 724.79698 588.1718" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M930.37281,515.18468c-.79517,1.52892-1.6249,3.0316-2.48108,4.52559-32.83248,57.199-109.20839,92.7223-238.01329,73.921-73.13464-11.18293-104.28079,29.83575-134.4398,71.85037-.51575.72516-1.03108,1.45032-1.55536,2.17548-31.583,44.059-62.85157,88.24038-141.03582,73.554-82.8849-13.105-134.03794-80.40362-141.95341-152.254-.09641-.87367-.18344-1.75608-.26236-2.62975-4.44683-46.58394,9.29594-94.81912,44.3561-131.23356,21.17789-21.99019,51.26694-33.67111,82.32563-33.30419a151.32547,151.32547,0,0,0,27.92237-2.07058c2.03571-.35818,4.01042-.75134,5.93224-1.19692,39.56841-9.04244,57.802-35.92519,68.98472-68.73138.26235-.77758.52428-1.55515.77768-2.34142,25.6772-78.23688,13.80377-188.04811,153.39855-171.894,124.9169,9.20843,216.591,78.47279,261.55836,158.3871.44579.80375.89116,1.60757,1.328,2.41132a243.7444,243.7444,0,0,1,26.14,71.03788c.27985,1.39784.53325,2.79574.76915,4.19359C950.48464,448.69858,946.31723,484.77233,930.37281,515.18468Z" transform="translate(-237.60151 -155.9141)" fill="#f2f2f2"/><path d="M917.21533,336.35375a191.29576,191.29576,0,0,1-30.11507,28.75237C844.03718,398.13078,789.494,416.041,735.685,419.79771a300.8355,300.8355,0,0,1-82.579-5.609c-27.608-5.78367-53.94042-15.97061-79.44271-27.87-24.80353-11.57609-48.87289-24.62868-73.51047-36.528.26235-.77758.52428-1.55515.77768-2.34142,26.86527,12.93026,53.18022,27.17977,80.35989,39.49846,25.60723,11.61107,52.11416,21.08159,79.8356,26.14885a299.77989,299.77989,0,0,0,83.85455,3.285c53.661-5.39925,108.2477-25.19653,149.502-60.615a178.51216,178.51216,0,0,0,21.40485-21.82418C916.33313,334.74618,916.7785,335.55,917.21533,336.35375Z" transform="translate(-237.60151 -155.9141)" fill="#fff"/><path d="M730.77368,156.73592q-.09386,0-.18771.006C664.36952,160.89039,612.5,216.16114,612.5,282.57172c0,66.411,51.86952,121.68213,118.086,125.82938a2.87636,2.87636,0,0,0,2.16829-.77891,2.84615,2.84615,0,0,0,.90645-2.09449v-245.912a2.8864,2.8864,0,0,0-2.887-2.87981Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><path d="M832.01475,366.60049a3.71271,3.71271,0,0,1-2.6183-1.08374l-85.61708-85.61708a3.67264,3.67264,0,0,1-1.08294-2.61389v-117.67a3.65964,3.65964,0,0,1,1.16556-2.6925,3.71574,3.71574,0,0,1,2.782-1.00112C813.292,160.09744,865.5,215.72877,865.5,282.57172A126.89278,126.89278,0,0,1,834.82077,365.313a3.71674,3.71674,0,0,1-2.66884,1.28508Q832.08333,366.6005,832.01475,366.60049Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><path d="M746.4081,409.22894a3.72724,3.72724,0,0,1-2.5445-1.00673,3.66232,3.66232,0,0,1-1.16717-2.69531V299.35766a3.69652,3.69652,0,0,1,6.30992-2.61389l74.71149,74.71149a3.70429,3.70429,0,0,1-.13877,5.36736,127.17445,127.17445,0,0,1-76.94155,32.3991C746.56131,409.22654,746.48431,409.22894,746.4081,409.22894Z" transform="translate(-237.60151 -155.9141)" fill="#ea5b31"/><path d="M944.12453,411.58522c-11.9869,21.25634-28.90993,40.00525-48.2876,54.86628-43.06308,33.02466-97.60628,50.93484-151.4153,54.6916a300.83591,300.83591,0,0,1-82.579-5.609c-27.608-5.78367-53.94042-15.97061-79.44271-27.87-25.96515-12.11776-51.13555-25.86058-76.98765-38.20545-25.82522-12.33623-52.36756-22.85516-80.17645-29.73966,2.03571-.35818,4.01042-.75134,5.93224-1.19692q2.72593.70764,5.43439,1.46775c54.37682,15.20183,102.36751,45.15986,153.42457,68.30329,25.60723,11.61107,52.11416,21.08159,79.8356,26.14885a299.77954,299.77954,0,0,0,83.85455,3.285c53.661-5.39926,108.2477-25.19653,149.502-60.615a174.25512,174.25512,0,0,0,40.13621-49.72037C943.63523,408.78947,943.88863,410.18737,944.12453,411.58522Z" transform="translate(-237.60151 -155.9141)" fill="#fff"/><path d="M404.27674,598.218c53.57311,14.97467,100.94353,44.27744,151.1619,67.26362-.51575.72516-1.03108,1.45032-1.55536,2.17548-1.27552-.5854-2.54208-1.17074-3.80907-1.76483-25.96515-12.11776-51.13555-25.86058-76.98765-38.20544-26.376-12.59832-53.49462-23.30074-81.94981-30.1765a366.17906,366.17906,0,0,0-120.2427-8.55318c-.09641-.87367-.18344-1.75608-.26236-2.62975A368.93631,368.93631,0,0,1,404.27674,598.218Z" transform="translate(-237.60151 -155.9141)" fill="#fff"/><path d="M619.60151,682.5154h-381a1,1,0,1,1,0-2h381a1,1,0,0,1,0,2Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><circle cx="155.11919" cy="367.13559" r="24.56103" fill="#a0616a"/><polygon points="247.019 540.442 247.592 552.689 200.629 560.729 199.783 542.655 247.019 540.442" fill="#a0616a"/><path d="M496.34511,692.67676l1.30363,27.84073-.49945.02341a18.99138,18.99138,0,0,1-11.01724-2.66478c-2.998-1.91061-4.72442-4.557-4.86009-7.45118l0-.00068-.79612-17.00411Z" transform="translate(-237.60151 -155.9141)" fill="#2f2e41"/><polygon points="245.705 560.594 257.965 560.593 263.797 513.305 245.703 513.306 245.705 560.594" fill="#a0616a"/><path d="M480.17949,712.50519l24.1438-.001h.001a15.38605,15.38605,0,0,1,15.38648,15.38623v.5l-39.53052.00147Z" transform="translate(-237.60151 -155.9141)" fill="#2f2e41"/><path d="M367.564,705.05286a10.74269,10.74269,0,0,0,2.50086-16.28168l9.78531-97.35423-23.30523,1.62911-2.29042,95.18376a10.80091,10.80091,0,0,0,13.30948,16.823Z" transform="translate(-237.60151 -155.9141)" fill="#a0616a"/><path d="M379.73616,608.29227,355.587,605.34932a4.81687,4.81687,0,0,1-4.0618-6.05829l6.43061-23.38608a13.37737,13.37737,0,0,1,26.54856,3.31433l.62968,24.16751a4.81687,4.81687,0,0,1-5.39791,4.90548Z" transform="translate(-237.60151 -155.9141)" fill="#ea5b31"/><path d="M376.358,718.843a16.66215,16.66215,0,0,1-12.63477-26.002l15.77417-16.376,57.5-51.5,30.74048-25.50879a13.76486,13.76486,0,0,1,22.15283,7.29L505.95081,671.715a4.49035,4.49035,0,0,1-2.84424,5.31445L485.598,683.3322a4.49957,4.49957,0,0,1-5.87232-3.07422l-6.66015-24.97558L436.0077,690.70916l11.562,4.25586a4.519,4.519,0,0,1,2.77661,5.44433L446.61,713.64666a4.48227,4.48227,0,0,1-4.2,3.27539Z" transform="translate(-237.60151 -155.9141)" fill="#2f2e41"/><path d="M374.78748,681.91716l-1.521-55.55371-9.59424-24.36621a36.66624,36.66624,0,0,1,26.67065-49.3457q1.1847-.24609,2.36255-.47949h0a36.66063,36.66063,0,0,1,43.62305,32.37207l4.50854,41.82226-.01831.08008c-7.189,31.97754-27.99243,49.57617-65.47021,55.38379Z" transform="translate(-237.60151 -155.9141)" fill="#ea5b31"/><path d="M397.47809,643.32818a10.52635,10.52635,0,0,1,1.65295-.12266l27.75915-41.09646-5.25714-10.84053,15.3233-10.07227,11.17175,18.28658a8,8,0,0,1-.91233,9.55759l-37.99226,41.71308a10.4971,10.4971,0,1,1-11.74542-7.42533Z" transform="translate(-237.60151 -155.9141)" fill="#a0616a"/><path d="M424.461,601.345a4.49516,4.49516,0,0,1-2.861-2.41974l-9.60046-20.44343a12.49741,12.49741,0,0,1,20.779-13.89132l15.1683,16.83267a4.5,4.5,0,0,1-.85312,6.76051l-18.93115,12.57586A4.495,4.495,0,0,1,424.461,601.345Z" transform="translate(-237.60151 -155.9141)" fill="#ea5b31"/><path d="M718.48465,542.10138h-81.07a4.406,4.406,0,0,1,0-8.812h81.07a4.406,4.406,0,0,1,0,8.812Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><path d="M613.18179,546.50735a9.25255,9.25255,0,1,1,9.25255-9.25255A9.26308,9.26308,0,0,1,613.18179,546.50735Z" transform="translate(-237.60151 -155.9141)" fill="#3f3d56"/><path d="M718.48465,568.53724h-81.07a4.406,4.406,0,1,1,0-8.812h81.07a4.406,4.406,0,1,1,0,8.812Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><path d="M613.18179,572.94322a9.25256,9.25256,0,1,1,9.25255-9.25255A9.26308,9.26308,0,0,1,613.18179,572.94322Z" transform="translate(-237.60151 -155.9141)" fill="#3f3d56"/><path d="M718.48465,594.97311h-81.07a4.406,4.406,0,0,1,0-8.812h81.07a4.406,4.406,0,0,1,0,8.812Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><path d="M613.18179,599.37908a9.25255,9.25255,0,1,1,9.25255-9.25255A9.26308,9.26308,0,0,1,613.18179,599.37908Z" transform="translate(-237.60151 -155.9141)" fill="#3f3d56"/><path d="M741.777,564.01246h33.48543a.88124.88124,0,0,0,.88119-.8812V356.12018a.88119.88119,0,1,0-1.76239,0V562.25007H741.777a.8812.8812,0,1,0,0,1.76239Z" transform="translate(-237.60151 -155.9141)" fill="#3f3d56"/><path d="M885.26285,220.82h0a11.35767,11.35767,0,1,1,10.409-12.233A11.35769,11.35769,0,0,1,885.26285,220.82Zm-.1403-1.74169h0a9.61034,9.61034,0,1,0-10.351-8.80764A9.61034,9.61034,0,0,0,885.12255,219.07835Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><circle cx="686.77025" cy="28.77379" r="6.98934" fill="#ccc"/><circle cx="721.12536" cy="6.81515" r="3.67143" fill="#ccc"/><path d="M831.89614,444.37418a11.35767,11.35767,0,1,1-3.21463-15.7372h0A11.37027,11.37027,0,0,1,831.89614,444.37418Zm-17.494-11.55929a9.61034,9.61034,0,1,0,13.31609-2.72008h0A9.62122,9.62122,0,0,0,814.40214,432.81489Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><circle cx="607.90099" cy="323.24113" r="6.98934" fill="#ccc"/><circle cx="627.39703" cy="359.05118" r="3.67143" fill="#ccc"/><path d="M549.87913,253.62044a11.35767,11.35767,0,1,1,15.22542,5.11666h0A11.37028,11.37028,0,0,1,549.87913,253.62044Zm18.7773-9.33116a9.61034,9.61034,0,1,0-4.32948,12.883h0A9.62122,9.62122,0,0,0,568.65643,244.28928Z" transform="translate(-237.60151 -155.9141)" fill="#ccc"/><circle cx="275.36504" cy="92.02168" r="6.98934" fill="#ccc"/><circle cx="234.60685" cy="90.91505" r="3.67143" fill="#ccc"/><path d="M418.67622,525.19874l-1.02377-2.60927c-2.8244-7.19867-9.5783-12.732-16.80609-13.76922a19.20813,19.20813,0,0,0-18.63817,8.64159,42.10036,42.10036,0,0,0-3.93183,9.20259c-.32216.95662-.64688,1.64894-1.27065,1.85828-.70236.25273-1.40116-.18-2.55932-.89806a1.60179,1.60179,0,0,0-2.43032,1.57838l1.21448,8.66966-1.01631-.9045c-6.61253-5.88565-7.97108-16.9613-3.19423-23.98816l-10.8713,2.23356.4898-.93454a37.127,37.127,0,0,1,21.64431-18.27963l-10.41317-2.29319,1.05251-.64867c9.32523-5.74455,21.62745-5.58275,31.33955.40292a35.54287,35.54287,0,0,1,16.356,28.93535Z" transform="translate(-237.60151 -155.9141)" fill="#2f2e41"/></svg>
                    </div>
                    </div>
                  </div>
                </div>
              </section>
              <div class="custom-shape-divider-bottom-1688096384">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M598.97 114.72L0 0 0 120 1200 120 1200 0 598.97 114.72z" class="shape-fill"></path>
                </svg>
            </div>
            
        </div>
        @livewireScripts    
    </body>
</html>

<x-housekeeping.layouts.housekeeping>
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-8">
            <x-housekeeping.content-card>
                <h2 class="text-center text-2xl font-bold">
                    {{ __('Welcome to the :hotel housekeeping', ['hotel' => setting('hotel_name')]) }} 🚀
                </h2>

               <div class="space-y-4">
                   <p class="mt-4">
                       {{ __('The :hotel housekeeping is a place giving you access various aspects of the hotel, that would otherwise be limited.', ['hotel' => setting('hotel_name')]) }}
                       {{ __('It is designed to ease the process of moderating and managing the hotel when needed.') }}
                   </p>

                   <p>
                       <strong>{{ __('However, it is essential to remember that with great power comes great responsibility.') }}</strong><br/>
                       {{ __('The housekeeping is not to be abused, and we take the utmost precautions to ensure the safety and privacy of our users. To maintain a secure environment, we will be logging every action performed within the housekeeping. Therefore, we kindly warn you that any misuse of the housekeeping, including abusing its features or sharing any confidential information obtained through it with unauthorized individuals, will result in potential suspension and loss of access.') }}
                   </p>

                   <p>
                       {{ __('We trust that you will use this tool wisely and responsibly, carrying out your duties with professionalism and dedication. The housekeeping provides a way for you to manage various aspects of the hotel, that would otherwise be limited. Should you encounter any issues or have questions, our support team is available around the clock to assist you.') }}
                   </p>

                   <p>
                       {{ __('By utilizing the housekeeping feature, you contribute significantly to upholding our hotel\'s reputation for excellence and creating a pleasant stay for our valued guests. Your dedication to maintaining the highest standards of service is greatly appreciated.') }}
                   </p>

                   <p>
                       {{ __('Thank you for being a part of our :hotel staff team. Together, we strive to make every guest\'s experience extraordinary, ensuring they leave with cherished memories and a desire to return.', ['hotel' => setting('hotel_name')]) }}
                   </p>
               </div>
            </x-housekeeping.content-card>
        </div>

        <div class="col-span-4">
            <x-housekeeping.content-card classes="p-4 h-full overflow-y-auto">
                <h2 class="font-bold text-2xl">Recent users</h2>
                <hr>

                <div class="mt-2 space-y-2">
                    @foreach($recentUsers as $user)
                        <div class="w-full p-2 bg-gray-100 rounded flex items-center justify-between gap-x-4">
                            <div class="flex h-[35px] items-center">
                                <div @class([
                                    'mt-[30px]' => !Str::contains(setting('avatar_imager'), 'habbo-imaging/avatarimage')
                                ])>
                                    <img src="{{ setting('avatar_imager') }}{{ $user->look }}&headonly=1" alt="">
                                </div>

                                <p>
                                    {{ $user->username }}
                                </p>

                                <div class="ml-1 w-2 h-2 rounded-full {{ $user->online ? 'bg-green-500' : 'bg-red-500' }}"></div>
                            </div>

                            <div class="flex gap-x-2">
                                <button>
                                    <x-housekeeping.icons.eye />
                                </button>
                                <button>
                                    <x-housekeeping.icons.pencil />
                                </button>
                                <button>
                                    <x-housekeeping.icons.ban />
                                </button>
                            </div>
                        </div>

                    @endforeach
                </div>
            </x-housekeeping.content-card>
        </div>

        <div class="col-span-6">
            <x-housekeeping.content-card classes="p-4">
                <h2 class="font-bold text-2xl">Recent room chatlogs</h2>
                <hr>

                <div class="mt-2 space-y-2">
                    @foreach($chatlogsRoom as $chat)
                        <div class="w-full p-2 bg-gray-100 rounded flex items-center justify-between gap-x-4">
                            <div class="flex h-[35px] items-center">
                                <div @class([
                                    'mt-[30px]' => !Str::contains(setting('avatar_imager'), 'habbo-imaging/avatarimage')
                                ])>
                                    <img src="{{ setting('avatar_imager') }}{{ $chat?->user?->look }}&headonly=1" alt="">
                                </div>

                                <p>
                                    {{ $chat?->user?->username }}
                                </p>

                                <div class="ml-1 w-2 h-2 rounded-full {{ $chat?->user?->online ? 'bg-green-500' : 'bg-red-500' }}"></div>

                                <p class="ml-4">
                                    {{ Str::limit($chat->message, 55) }}
                                </p>
                            </div>

                            <div class="flex gap-x-4">
                                [Room: {{ Str::limit($chat?->room?->name, 20) }}]
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-housekeeping.content-card>
        </div>

        <div class="col-span-6">
            <x-housekeeping.content-card classes="p-4">
                <h2 class="font-bold text-2xl">Recent private chatlogs</h2>
                <hr>

                <div class="mt-2 space-y-2">
                    @foreach($chatlogsPrivate as $chat)
                        <div class="w-full p-2 bg-gray-100 rounded flex items-center justify-between gap-x-4">
                            <div class="flex h-[35px] items-center">
                                <div @class([
                                    'mt-[30px]' => !Str::contains(setting('avatar_imager'), 'habbo-imaging/avatarimage')
                                ])>
                                    <img src="{{ setting('avatar_imager') }}{{ $chat?->sender?->look }}&headonly=1" alt="">
                                </div>

                                <p>
                                    {{ $chat?->sender?->username }}
                                </p>

                                <div class="ml-1 w-2 h-2 rounded-full {{ $chat?->sender?->online ? 'bg-green-500' : 'bg-red-500' }}"></div>

                                <p class="ml-4">
                                    {{ Str::limit($chat->message, 55) }}
                                </p>
                            </div>

                            <div class="flex gap-x-4">
                                [Receiver: {{ $chat?->receiver?->username }}]
                            </div>
                        </div>
                    @endforeach
                </div>
            </x-housekeeping.content-card>
        </div>
    </div>
</x-housekeeping.layouts.housekeeping>

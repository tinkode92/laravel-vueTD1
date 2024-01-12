<template>
    <div>
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                <div class="relative flex h-16 items-center justify-between">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                    >
                        <!-- Mobile menu button-->
                        <button
                            type="button"
                            class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                            aria-controls="mobile-menu"
                            aria-expanded="false"
                        >
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
                            <svg
                                class="block h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                                />
                            </svg>
                            <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
                            <svg
                                class="hidden h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                    <div
                        class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                    >
                        <div class="flex flex-shrink-0 items-center">
                            <img
                                class="h-8 w-auto"
                                src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                                alt="Your Company"
                            />
                        </div>
                        <div class="hidden sm:ml-6 sm:block">
                            <div class="flex space-x-4">
                                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                                <Link
                                    :href="route('tracks.index')"
                                    class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                    aria-current="page"
                                    >Musiques</Link
                                >
                                <Link
                                    :href="route('playlists.index')"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    >Playlists</Link
                                >

                                <Link
                                    :href="route('apikey.index')"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium"
                                    >Key generation</Link
                                >
                            </div>
                        </div>
                    </div>
                    <div
                        clLinkss="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                    >
                        <!-- Profile dropdown -->
                        <div class="flex">
                            <div class="relative ml-3">
                                <Link
                                    v-if="!$page.props.auth.user"
                                    :href="route('login')"
                                    class="bg-gray-500 text-white rounded-md px-3 py-2 text-sm font-medium"
                                    as="button"
                                >
                                    Se connecter
                                </Link>
                            </div>
                            <div class="relative ml-3">
                                <Link
                                    v-if="!$page.props.auth.user"
                                    class="bg-gray-500 text-white rounded-md px-3 py-2 text-sm font-medium"
                                    :href="route('register')"
                                >
                                    Créer un compte
                                </Link>
                            </div>
                            <div class="relative ml-3">
                                <Link
                                    v-if="$page.props.auth.user"
                                    class="bg-gray-500 text-white rounded-md px-3 py-2 text-sm font-medium"
                                    :href="route('logout')"
                                    :method="'POST'"
                                >
                                    Se déconnecter
                                </Link>
                            </div>
                        </div>

                        <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
        </nav>

        <div class="px-16">
            <div class="flex justify-between items-center">
                <h4 class="text-3xl font-bold my-6">
                    <slot name="title" />
                </h4>
                <div>
                    <slot name="action" />
                </div>
            </div>
            <slot name="content"></slot>
        </div>
    </div>
</template>
<script>
export default {};
</script>
<style></style>

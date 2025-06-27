<!-- Button toggle -->
<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
    type="button"
    class="ms-3 mt-2 inline-flex items-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 sm:hidden">
    <span class="sr-only">Open sidebar</span>
    <svg class="h-6 w-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd"
            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
        </path>
    </svg>
</button>

<!-- Sidebar -->
<aside id="default-sidebar"
    class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-amber-400 px-3 py-4 shadow-2xl">
        <div>
            <!-- Logo -->
            <div class="mb-4 flex items-center justify-center">
                <img src="{{ asset('icon/favicon.png') }}" class="w-32" alt="">
            </div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="{{ request()->is('dashboard') ? 'bg-gray-100' : 'hover:bg-gray-100 text-white' }} group flex items-center rounded-lg p-2 text-black hover:text-gray-900">
                        <svg class="{{ request()->is('dashboard') ? '' : 'text-white' }} h-5 w-5 text-black transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                @if (Auth::user()->role != 'dokter')
                    <li>
                        <a href="{{ route('show.pasien') }}"
                            class="{{ request()->is('*pasien') ? 'bg-gray-100' : 'text-white' }} group flex items-center rounded-lg p-2 text-black hover:bg-gray-100 hover:text-gray-900">
                            <svg class="{{ request()->is('*pasien') ? '' : 'text-white' }} h-5 w-5 shrink-0 text-black transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 18 18">
                                <path
                                    d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                            </svg>
                            <span class="ms-3 flex-1 whitespace-nowrap">Data Pasien</span>
                        </a>
                    </li>
                @endif
                <li>
                    @if (Auth::user()->role != 'petugas')
                        <a href="{{ route('show.pemeriksaan') }}"
                            class="{{ request()->is('pemeriksaan-klinis*') ? 'bg-gray-100' : 'hover:bg-gray-100 text-white' }} group flex items-center rounded-lg p-2 text-black hover:text-gray-900">
                            <svg class="{{ request()->is('pemeriksaan-klinis*') ? '' : 'text-white' }} h-5 w-5 shrink-0 text-black transition duration-75 group-hover:text-gray-900"
                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 22 21">
                                <path
                                    d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                                <path
                                    d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                            </svg>
                            <span class="ms-3 flex-1 whitespace-nowrap">Pemeriksaan Klinis</span>
                        </a>
                </li>
                <li>
                    <a href="{{ route('laporan.kunjungan') }}"
                        class="{{ request()->is('laporan-kunjungan*') ? 'bg-gray-100' : 'hover:bg-gray-100 text-white' }} group flex items-center rounded-lg p-2 text-black hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                        </svg>
                        <span class="ms-3">Laporan Kunjungan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pelepasan.informasi') }}"
                        class="{{ request()->is('pelepasan-informasi*') ? 'bg-gray-100' : 'hover:bg-gray-100 text-white' }} group flex items-center rounded-lg p-2 text-black hover:text-gray-900">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m7.875 14.25 1.214 1.942a2.25 2.25 0 0 0 1.908 1.058h2.006c.776 0 1.497-.4 1.908-1.058l1.214-1.942M2.41 9h4.636a2.25 2.25 0 0 1 1.872 1.002l.164.246a2.25 2.25 0 0 0 1.872 1.002h2.092a2.25 2.25 0 0 0 1.872-1.002l.164-.246A2.25 2.25 0 0 1 16.954 9h4.636M2.41 9a2.25 2.25 0 0 0-.16.832V12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 12V9.832c0-.287-.055-.57-.16-.832M2.41 9a2.25 2.25 0 0 1 .382-.632l3.285-3.832a2.25 2.25 0 0 1 1.708-.786h8.43c.657 0 1.281.287 1.709.786l3.284 3.832c.163.19.291.404.382.632M4.5 20.25h15A2.25 2.25 0 0 0 21.75 18v-2.625c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125V18a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                        <span class="ms-3">Pelepasan Informasi</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->role == 'admin')
                    {{-- <li>
                        <button type="button"
                            class="group flex w-full items-center rounded-lg p-2 text-base text-white transition duration-75 hover:bg-white hover:text-black"
                            aria-controls="master-data" data-collapse-toggle="master-data">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125S3.75 19.903 3.75 17.625V6.375m16.5 0v3.563c0 2.278-3.694 4.125-8.25 4.125S3.75 12.216 3.75 9.938V6.375" />
                            </svg>
                            <span class="ms-3 flex-1 cursor-pointer whitespace-nowrap text-left rtl:text-right">Master
                                Data</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="master-data" class="hidden space-y-2 rounded-lg border-2 border-white py-2">
                            <li>
                                <a href="{{ route('master.agama') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Agama</a>
                            </li>
                            <li>
                                <a href="{{ route('master.cara-pembayaran') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Cara
                                    Pembayaran</a>
                            </li>
                            <li>
                                <a href="{{ route('master.jenis-kelamin') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Jenis
                                    Kelamin</a>
                            </li>
                            <li>
                                <a href="{{ route('master.pekerjaan') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Pekerjaan</a>
                            </li>
                            <li>
                                <a href="{{ route('master.pendidikan') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Pendidikan</a>
                            </li>
                            <li>
                                <a href="{{ route('master.status-pernikahan') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Status
                                    Pernikahan</a>
                            </li>
                        </ul>
                    </li> --}}
                @endif
            </ul>
            <p class="mt-4 text-white">Account</p>
            {{-- user setting --}}
            <ul class="mt-1 space-y-2 border-t border-white pt-2 font-medium">
                @if (Auth::user()->role == 'dokter' || Auth::user()->role == 'petugas')
                    <li>
                        <a href="{{ route('logout') }}"
                            class="group flex items-center rounded-lg p-2 text-white hover:bg-gray-100 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                            </svg>
                            <span class="ms-3">Logout</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'admin')
                    <li>
                        <button type="button"
                            class="group flex w-full items-center rounded-lg p-2 text-base text-white transition duration-75 hover:bg-white hover:text-black"
                            aria-controls="setting" data-collapse-toggle="setting">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span
                                class="ms-3 flex-1 cursor-pointer whitespace-nowrap text-left rtl:text-right">Setting</span>
                            <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul id="setting" class="hidden space-y-2 rounded-lg border-2 border-white py-2">
                            <li>
                                <a href="{{ route('show.user') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">User</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    class="group flex w-full items-center rounded-lg p-2 pl-11 text-white transition duration-75 hover:bg-white hover:text-black">Logout</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</aside>

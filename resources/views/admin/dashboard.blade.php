@extends('layouts.app')

@section('header')
    <div class="iq-navbar-header" style="height: 215px;">
        <div class="container-fluid iq-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Hello Admin!</h5>
                            <p>Selamat datang di Dashboard Unit Transfusi Darah Kab. Maros.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header-img">
            <img src="../assets/images/dashboard/top-header.png" alt="header"
                class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
            <img src="../assets/images/dashboard/top-header1.png" alt="header"
                class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
            <img src="../assets/images/dashboard/top-header2.png" alt="header"
                class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
            <img src="../assets/images/dashboard/top-header3.png" alt="header"
                class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
            <img src="../assets/images/dashboard/top-header4.png" alt="header"
                class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
            <img src="../assets/images/dashboard/top-header5.png" alt="header"
                class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bg-primary text-white rounded p-3">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="text-end">
                                    User
                                    <h2 class="counter" style="visibility: visible;">{{ $user }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bg-warning text-white rounded p-3">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.2124 7.76241C14.2124 10.4062 12.0489 12.5248 9.34933 12.5248C6.6507 12.5248 4.48631 10.4062 4.48631 7.76241C4.48631 5.11865 6.6507 3 9.34933 3C12.0489 3 14.2124 5.11865 14.2124 7.76241ZM2 17.9174C2 15.47 5.38553 14.8577 9.34933 14.8577C13.3347 14.8577 16.6987 15.4911 16.6987 17.9404C16.6987 20.3877 13.3131 21 9.34933 21C5.364 21 2 20.3666 2 17.9174ZM16.1734 7.84875C16.1734 9.19506 15.7605 10.4513 15.0364 11.4948C14.9611 11.6021 15.0276 11.7468 15.1587 11.7698C15.3407 11.7995 15.5276 11.8177 15.7184 11.8216C17.6167 11.8704 19.3202 10.6736 19.7908 8.87118C20.4885 6.19676 18.4415 3.79543 15.8339 3.79543C15.5511 3.79543 15.2801 3.82418 15.0159 3.87688C14.9797 3.88454 14.9405 3.90179 14.921 3.93246C14.8955 3.97174 14.9141 4.02253 14.9396 4.05607C15.7233 5.13216 16.1734 6.44206 16.1734 7.84875ZM19.3173 13.7023C20.5932 13.9466 21.4317 14.444 21.7791 15.1694C22.0736 15.7635 22.0736 16.4534 21.7791 17.0475C21.2478 18.1705 19.5335 18.5318 18.8672 18.6247C18.7292 18.6439 18.6186 18.5289 18.6333 18.3928C18.9738 15.2805 16.2664 13.8048 15.5658 13.4656C15.5364 13.4493 15.5296 13.4263 15.5325 13.411C15.5345 13.4014 15.5472 13.3861 15.5697 13.3832C17.0854 13.3545 18.7155 13.5586 19.3173 13.7023Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="text-end">
                                    Pendonor
                                    <h2 class="counter" style="visibility: visible;">{{ $pendonor }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="bg-danger text-white rounded p-3">
                                    <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M10.7044 3.51898C10.034 3.51898 9.46373 3.9848 9.30365 4.61265H14.6863C14.5263 3.9848 13.956 3.51898 13.2856 3.51898H10.7044ZM16.2071 4.61264H18.1881C20.2891 4.61264 22 6.34428 22 8.47085C22 8.47085 21.94 9.3711 21.92 10.6248C21.918 10.724 21.8699 10.8212 21.7909 10.88C21.3097 11.2354 20.8694 11.5291 20.8294 11.5493C19.1686 12.6632 17.2386 13.447 15.1826 13.8369C15.0485 13.8632 14.9165 13.7934 14.8484 13.6739C14.2721 12.6754 13.1956 12.0253 11.995 12.0253C10.8024 12.0253 9.71586 12.6683 9.12256 13.6678C9.05353 13.7853 8.92346 13.8531 8.7904 13.8278C6.75138 13.4369 4.82141 12.6541 3.17059 11.5594L2.21011 10.8911C2.13007 10.8405 2.08004 10.7493 2.08004 10.6481C2.05003 10.1316 2 8.47085 2 8.47085C2 6.34428 3.71086 4.61264 5.81191 4.61264H7.78289C7.97299 3.1443 9.2036 2 10.7044 2H13.2856C14.7864 2 16.017 3.1443 16.2071 4.61264ZM21.6598 12.8152L21.6198 12.8355C19.5988 14.1924 17.1676 15.0937 14.6163 15.4684C14.2561 15.519 13.8959 15.2861 13.7959 14.9216C13.5758 14.0912 12.8654 13.5443 12.015 13.5443H12.005H11.985C11.1346 13.5443 10.4242 14.0912 10.2041 14.9216C10.1041 15.2861 9.74387 15.519 9.38369 15.4684C6.83242 15.0937 4.4012 14.1924 2.38019 12.8355C2.37019 12.8254 2.27014 12.7646 2.1901 12.8152C2.10005 12.8659 2.10005 12.9874 2.10005 12.9874L2.17009 18.1519C2.17009 20.2785 3.87094 22 5.97199 22H18.018C20.1191 22 21.8199 20.2785 21.8199 18.1519L21.9 12.9874C21.9 12.9874 21.9 12.8659 21.8099 12.8152C21.7599 12.7849 21.6999 12.795 21.6598 12.8152ZM12.7454 17.0583C12.7454 17.4836 12.4152 17.8177 11.995 17.8177C11.5848 17.8177 11.2446 17.4836 11.2446 17.0583V15.7519C11.2446 15.3367 11.5848 14.9924 11.995 14.9924C12.4152 14.9924 12.7454 15.3367 12.7454 15.7519V17.0583Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="text-end">
                                    Stok Darah
                                    <h2 class="counter" style="visibility: visible;">{{ $stok }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection

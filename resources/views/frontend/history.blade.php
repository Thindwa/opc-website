@extends('layouts.frontend')
<style>
    /* Banner Area */
    .banner-area {
        min-height: 150px !important;
        /* or height: 200px if you want fixed height */
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
    }

    .banner-area::before {
        content: '';
        background: rgba(0, 0, 0, 0.6);
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .banner-text {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: #fff;
    }

    .banner-title {
        font-size: 2rem;
        /* Slightly smaller to match new height */
        font-weight: 700;
        text-transform: uppercase;
    }
</style>

@section('content')
    <!-- Banner Section -->
    <div id="banner-area" class="banner-area" style="background-image:url(frontendassets/images/banner/banner1.jpg)">
        <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">About OPC</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">OPC</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">History</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="mx-lg-5 mx-md-5 my-2">
        <section >

            <!-- Title Section -->
            <div class="row mb-4">
                <div class="col-lg-12 text-center">
                    <h4 class="text-dark">HISTORY OF PRESIDENCY OF THE REPUBLIC OF MALAWI</h4>
                    <div class="title-divider mx-auto my-3 bg-success"></div>
                </div>
            </div>

            <!-- Featured Image -->
            <!-- Presidents Table -->
            <div class="row ">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white rounded-lg shadow-sm p-3">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Portrait</th>
                                    <th>President<br>(Birth – Death)</th>
                                    <th>Period in Office</th>
                                    <th>Political Party</th>
                                    <th>History Content</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: #28a745; color: white;">1</td>
                                    <td><img src="{{ asset('frontendassets/images/history/banda.jpg') }}"
                                            alt="Hastings Banda" width="100"></td>
                                    <td>Hastings Banda<br>(1898–1997)</td>
                                    <td>1966–1994</td>
                                    <td>Malawi Congress Party</td>
                                    <td>Dr Banda ruled the Country for 31 years before stepping down in 1994 after conceding
                                        electoral defeat to Dr Bakili Muluzi of the United Democratic Front (UDF).</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ffe60a;">2</td>
                                    <td><img src="{{ asset('frontendassets/images/history/bakili.jpeg') }}"
                                            alt="Bakili Muluzi" width="100"></td>
                                    <td>Bakili Muluzi<br>(Born 1943)</td>
                                    <td>1994–2004</td>
                                    <td>United Democratic Front</td>
                                    <td>Dr Muluzi became the 2nd President of the republic on 24th May 1994. He ruled the
                                        Country for 10 years from 1994 to 2004, at the end of his Constitutional two terms.
                                        Professor Bingu Wa Mutharika then of UDF was elected as the third president of the
                                        republic.

                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #22a3ff;">3</td>
                                    <td><img src="{{ asset('frontendassets/images/history/bingu.jpg') }}"
                                            alt="Bingu wa Mutharika" width="100"></td>
                                    <td>Bingu wa Mutharika<br>(1934–2012)</td>
                                    <td>2004–2012</td>
                                    <td>Democratic Progressive Party</td>
                                    <td>In 2005 Professor Mutharika left the UDF and formed his Democratic Progressive Party
                                        and was re-elected in 2009. In 2012 Professor Mutharika died of Cardiac arrest and
                                        his Vice Dr Joyce Banda took power as mandated by the Constitution.</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #ff5e00; ">4</td>
                                    <td><img src="{{ asset('frontendassets/images/history/joyce.jpg') }}" alt="Joyce Banda"
                                            width="100" height="80"></td>
                                    <td>Joyce Banda<br>(Born 1950)</td>
                                    <td>2012–2014</td>
                                    <td>Peoples Party</td>
                                    <td>By the time Dr Joyce Banda took power she had already left the DPP and was heading
                                        her Peoples Party (PP) which immediately became the ruling Party. Dr Joyce Banda
                                        left power after losing the 2014 election which was won by Professor Peter
                                        Mutharika, younger brother to late Bingu and new leader of the DPP.</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #22a3ff;">5</td>
                                    <td><img src="{{ asset('frontendassets/images/history/peter.jpeg') }}"
                                            alt="Peter Mutharika" width="100"></td>
                                    <td>Peter Mutharika<br>(Born 1940)</td>
                                    <td>2014–2020</td>
                                    <td>Democratic Progressive Party</td>
                                    <td>Professor Peter Mutharika became the 5th President of the republic on 21st May 2014.
                                        Professor Mutharika left power on June 26th 2020 after losing the Fresh elections
                                        which was sanctioned by the Constitutional Court after it nullified the 2019
                                        elections that had declared him a winner.</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #28a745; color: white;">6</td>
                                    <td><img src="{{ asset('frontendassets/images/team/team1.jpg') }}"
                                            alt="Lazarus Chakwera" width="100"></td>
                                    <td>Lazarus Chakwera<br>(Born 1955)</td>
                                    <td>Incumbent</td>
                                    <td>Malawi Congress Party</td>
                                    <td>The current President Dr Lazarus Chakwera ascended to power on 28 June following a
                                        58% majority win of the fresh elections. He is the sixth President of the republic.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-muted small mt-2">The evolution of Malawi's political leadership since independence
                        </div>
                    </div>
                </div>

                <!-- History Content -->

            </div>
        </section>
    </div>



    <!-- Main Content Section -->
    <div class="mx-lg-5 mx-md-5 ">
        <section >

            <!-- Title Section -->
            <div class="row mb-4">
                <div class="col-lg-12 text-center">
                    <h4 class="text-dark">HISTORY OF SECRETARY TO THE PRESIDENT AND CABINET</h4>
                    <div class="title-divider mx-auto my-3 bg-success"></div>
                </div>
            </div>

            <!-- Featured Image -->
            <!-- Presidents Table -->
            <div class="row mb-5">
                <div class="col-lg-12">
                    <div class="table-responsive bg-white rounded-lg shadow-sm p-3">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>SECRETARY TO THE PRESIDENT AND CABINET <br> (Birth – Death)</th>
                                    <th>Period in Office</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background-color: #28a745; color: white;">1</td>
                                    <td><img src="{{ asset('frontendassets/images/history/banda.jpg') }}"
                                            alt="Hastings Banda" width="100"></td>
                                    <td>Hastings Banda<br>(1898–1997)</td>
                                    <td>1966–1994</td>
                                      </tr>
                                <tr>
                                    <td style="background-color: #ffe60a;">2</td>
                                    <td><img src="{{ asset('frontendassets/images/history/bakili.jpeg') }}"
                                            alt="Bakili Muluzi" width="100"></td>
                                    <td>Bakili Muluzi<br>(Born 1943)</td>
                                    <td>1994–2004</td>


                                </tr>
                                <tr>
                                    <td style="background-color: #22a3ff;">3</td>
                                    <td><img src="{{ asset('frontendassets/images/history/bingu.jpg') }}"
                                            alt="Bingu wa Mutharika" width="100"></td>
                                    <td>Bingu wa Mutharika<br>(1934–2012)</td>
                                    <td>2004–2012</td>
                                       </tr>
                                <tr>
                                    <td style="background-color: #ff5e00; ">4</td>
                                    <td><img src="{{ asset('frontendassets/images/history/joyce.jpg') }}" alt="Joyce Banda"
                                            width="100" height="80"></td>
                                    <td>Joyce Banda<br>(Born 1950)</td>
                                    <td>2012–2014</td>
                                     </tr>
                                <tr>
                                    <td style="background-color: #22a3ff;">5</td>
                                    <td><img src="{{ asset('frontendassets/images/history/peter.jpeg') }}"
                                            alt="Peter Mutharika" width="100"></td>
                                    <td>Peter Mutharika<br>(Born 1940)</td>
                                    <td>2014–2020</td>
                                     </tr>
                                <tr>
                                    <td style="background-color: #28a745; color: white;">6</td>
                                    <td><img src="{{ asset('frontendassets/images/team/team1.jpg') }}"
                                            alt="Lazarus Chakwera" width="100"></td>
                                    <td>Lazarus Chakwera<br>(Born 1955)</td>
                                    <td>Incumbent</td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="text-muted small mt-2">The evolution of Malawi's political leadership since independence
                        </div>
                    </div>
                </div>

                <!-- History Content -->

            </div>
        </section>
    </div>
@endsection

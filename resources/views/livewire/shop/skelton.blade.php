<div>
    @php
        $count = [1, 2, 3, 4, 5, 6, 7, 8, 9];
    @endphp

    <style>
        .skeleton-loader-background {
            width: 100%;
            height: 15px;
            display: block;
            background: lightgray;
        }

        .skeleton-loader-gradient {
            width: 100%;
            height: 15px;
            display: block;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 0.5) 50%,
                    rgba(255, 255, 255, 0) 80%),
                lightgray;
            background-repeat: repeat-y;
            background-size: 50px 200px;
            background-position: 0 0;
        }

        .skeleton-loader {
            width: 100%;
            height: 15px;
            display: block;
            background: linear-gradient(to right,
                    rgba(255, 255, 255, 0),
                    rgba(255, 255, 255, 0.5) 50%,
                    rgba(255, 255, 255, 0) 80%),
                rgb(240, 240, 240);
            background-repeat: repeat-y;
            background-size: 50px 500px;
            background-position: 0 0;
            animation: shine 1s infinite;
            border-radius: 4px
        }

        @keyframes shine {
            to {
                background-position: 100% 0,
                    /* move highlight to right */
                    0 0;
            }
        }

        .img-cover {
            height: 120px !important;
        }

        @media only screen and (max-width: 600px) {
            .img-cover {
                height: 170px !important;
            }
        }
    </style>

    <div class="row">
        @foreach ($count as $item)
            <div class="col-lg-4 col-md-6 col-12 mt-4 pt-4">
                <div class="card shop-list border-0 position-relative">
                    <div class="skeleton-loader img-cover">
                    </div>
                    <div class="skeleton-loader mt-3">
                    </div>
                    <div class="skeleton-loader mt-2">
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

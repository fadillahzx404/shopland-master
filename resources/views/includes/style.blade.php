<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net" />
<link
    href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap"
    rel="stylesheet"
/>

<link
    href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"
    rel="stylesheet"
/>
<!--Responsive Extension Datatables CSS-->
<link
    href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css"
    rel="stylesheet"
/>

<style>
    @media (min-width: 768px) {
        .thumbnails {
            display: flex;
            flex-direction: column;
            margin-left: 1rem;
            padding: 0;
        }
    }

    .thumbnail {
        width: 115px;
        height: 115px;
        overflow: hidden;
        list-style: none;
        margin: 0 0.2rem;
        cursor: pointer;
        margin-bottom: 10px;
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .thumbnail {
        opacity: 0.3;
    }

    .thumbnail.is-active {
        opacity: 1;
    }
</style>
<!-- Styles -->
<style>
    .dataTables_wrapper .dataTables_filter,
    .dataTables_length {
        display: none;
    }

    table.dataTable.no-footer {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }
    table.dataTable thead th,
    table.dataTable thead td {
        border-bottom: 1px solid #e2e8f0;
        /*border-b-1 border-gray-300*/
        margin-top: 0.75em;
        margin-bottom: 0.75em;
    }
    .dataTables_wrapper {
        .row:nth-child(1),
        .row:nth-child(2) {
            display: none;
        }
    }
</style>

<style>
    .upload {
        &__box {
            padding: 40px;
        }
        &__inputfile {
            width: 0.1px;
            height: 0.1px;
            opacity: 0;
            overflow: hidden;
            position: absolute;
            z-index: -1;
        }

        &__btn {
            display: inline-block;
            font-weight: 600;
            color: #fff;
            text-align: center;
            min-width: 116px;
            padding: 5px;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid;
            background-color: #4045ba;
            border-color: #4045ba;
            border-radius: 10px;
            line-height: 26px;
            font-size: 14px;

            &:hover {
                background-color: unset;
                color: #4045ba;
                transition: all 0.3s ease;
            }

            &-box {
                margin-bottom: 10px;
            }
        }

        &__img {
            &-wrap {
                display: flex;
                flex-wrap: wrap;
                margin: 0 -10px;
            }

            &-box {
                width: 200px;
                padding: 0 10px;
                margin-bottom: 12px;
            }

            &-close {
                width: 24px;
                height: 24px;
                border-radius: 50%;
                background-color: black;
                position: absolute;
                top: 10px;
                right: 10px;
                text-align: center;
                line-height: 24px;
                z-index: 1;
                cursor: pointer;

                &:after {
                    content: "\2716";
                    font-size: 14px;
                    color: white;
                }
            }
        }
    }
    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        border-radius: 12px;
        padding-bottom: 100%;
    }
</style>

@vite(['resources/css/app.css','resources/js/app.js','resources/js/splider.js','resources/js/toast.js','resources/js/toast-error.js','resources/js/toast-cart.js'])

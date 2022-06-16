@extends('layouts.master')
@push('styles')
<style>
    .doctors{
        display: flex;
        margin-top: 25px;
    }
    .specialities{
        display: flex;
    }
    .product-info {
        text-align: center;
    }
    a.consult-now{
        text-decoration: none;
        font-size: 18px;
        font-weight: 600;
    }
    .doctor-desc{
        overflow: hidden;
    }

    .search{
        position:relative;
    }
    
    #label {
        position: absolute;
        top: 50%;
        margin-left: 10px;
        padding: 15px;
        transform: translate(0,-50%);
        font-size: 20px;
        font-family: 'Open Sans', sans-serif;
        color: #ccc;
    }

    i.fa.fa-search {
        font-size: 20px;
        margin: 10px;
        color: #ccc;
    }

    input.form-control {
        font-size: 30px;
    }

    .doctor-heading, .health-heading{
        font-size: 28px;
        font-weight: 600;
        font-family: 'Open Sans', sans-serif;
        line-height: 80px;
        cursor: pointer;
    }

    .health-concerns {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    img.health-img {
        min-height: 252px;
    }

    .health-block.shadow-sm {
        margin: 10px;
    }

    a{
        text-align: center;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="search">
            <label id='label' for="input"><i class="fa fa-search"></i> Search Specialist</label>
            <input type="text" class="form-control">
        </div>
        <div class="doctors">
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="doctor-heading">
            <p class="speciality-heading">Specialities</p>
        </div>
        <div class="specialities">
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-item col-sm-6 col-md-3 col-xs-12">
                <div class="product-block">
                    <a href="#"><img class="product-img" src="{{ asset('images/gynaecology.PNG') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Gynaecology</a>
                        </p>
                        <p class="doctor-desc">The health of the female reproductive system</p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="doctor-heading">
            <p class="health-heading">Health Concerns</p>
        </div>
        <div class="health-concerns">
            <div class="health-item col-sm-6 col-md-4 col-xs-12">
                <div class="health-block shadow-sm">
                    <a href="#"><img class="health-img" src="{{ asset('images/image 42 (1).png') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Cough & Cold</a>
                        </p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="health-item col-sm-6 col-md-4 col-xs-12">
                <div class="health-block shadow-sm">
                    <a href="#"><img class="health-img" src="{{ asset('images/image 42 (1).png') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Cough & Cold</a>
                        </p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="health-item col-sm-6 col-md-4 col-xs-12">
                <div class="health-block shadow-sm">
                    <a href="#"><img class="health-img" src="{{ asset('images/image 42 (1).png') }}" alt=""></a>
                    <div class="product-info">
                        <p class="product-title">
                            <a href="#" class="product-title-anchor">Cough & Cold</a>
                        </p>
                        <div class="consult">
                            <a class="consult-now">Consult Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq-outer">
        <div class="faq-outer-heading">
            Frequently asked questions
        </div>
        <div class="faq-outer-block shadow-sm">
            <div class="faq-inner">
                <p class="faq-inner-heading">General Inquiry</p>
            </div>

            <div class="faq-content">
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, laudantium 1.
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus eveniet velit facere nesciunt ut iste ducimus asperiores possimus, tempora natus enim obcaecati ratione minus porro illo deleniti excepturi qui vero.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, laudantium 2.
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus veritatis animi numquam eum mollitia amet at? At similique optio eligendi officia sed tempore culpa, assumenda pariatur atque necessitatibus laboriosam magni!</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque, laudantium 3.
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id corporis harum autem, nobis atque dolorem possimus incidunt quo eaque reprehenderit doloribus? Id, eum omnis. Expedita maiores eos maxime nemo fugit?</div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
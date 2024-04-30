@extends('master')
@section('admin')
@if(!empty($content))
    {{ $content}}
@endif
<div class="row inbox-wrapper">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 border-end-lg">
              <div class="aside-content">
                <div class="d-flex align-items-center justify-content-between">
                  <button class="navbar-toggle btn btn-icon border d-block d-lg-none" data-bs-target=".email-aside-nav" data-bs-toggle="collapse" type="button">
                    <span class="icon"><i data-feather="chevron-down"></i></span>
                  </button>
                  <div class="order-first">
                    <h4>Mail Marketing</h4>
                    <p class="text-muted">amiahburton@gmail.com</p>
                  </div>
                </div>
                <div class="d-grid my-3">
                  <a class="btn btn-primary" href="">Compose Email</a>
                </div>
              <div class="email-aside-nav collapse">
                <ul class="nav flex-column">
                  <li class="nav-item active">
                    <a class="nav-link d-flex align-items-center" href="#">
                      <i data-feather="mail" class="icon-lg me-2"></i>
                      Sent Mail
                    </a>
                  </li>
                </ul>
              </div>
              </div>
            </div>
            <div class="col-lg-9">
              <div>
                <div class="d-flex align-items-center p-3 border-bottom tx-16">
                  <span data-feather="edit" class="icon-md me-2"></span>
                  New message
                </div>
              </div>
              <form action="{{route('email.To.Customer.Send')}}" method="POST">
                    @csrf
                    <div class="p-3 pb-0">
                        <div class="to">
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">To:</label>
                            <div class="col-md-10">
                            <select name="mails[]" class="compose-multiple-select form-select" multiple="multiple">
                                <option value="majid.bd905@gmail.com">majid.bd905@gmail.com</option>
                                <option value="abm.bd905@gmail.com">abm.bd905@gmail.com</option>
                                <option value="eclipseintellitech@gmail.com">eclipseintellitech@gmail.com</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="to cc">
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Cc</label>
                            <div class="col-md-10">
                            <select class="compose-multiple-select form-select" multiple="multiple">
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska" selected="selected">Alaska</option>
                                <option value="Melbourne">Melbourne</option>
                                <option value="Victoria" selected="selected">Victoria</option>
                                <option value="Newyork">Newyork</option>
                            </select>
                            </div>
                        </div>
                        </div>
                        <div class="subject">
                        <div class="row mb-3">
                            <label class="col-md-2 col-form-label">Subject</label>
                            <div class="col-md-10">
                            <input name="subject" class="form-control" type="text">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="px-3">
                        <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label visually-hidden" for="easyMdeEditor">Descriptions </label>
                                            <textarea name="message" class="form-control" name="easymde" id="easyMdeEditor" rows="5"></textarea>
                        </div>
                        </div>
                        <div>
                        <div class="col-md-12">
                            <button class="btn btn-primary me-1 mb-1" type="submit">Send</button>
                        </div>
                        </div>
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

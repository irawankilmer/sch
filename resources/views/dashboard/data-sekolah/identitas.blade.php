@extends('dashboard.layouts.app')
@section('title', 'Data Sekolah - Identitas')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
                  <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Identitas Sekolah</h5>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="nama-sekolah-label">Nama Sekolah</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="nama-sekolah" class="input-group-text"
                                ><i class="icon-base bx bx-user"></i
                              ></span>
                              <input
                                type="text"
                                class="form-control"
                                id="nama-sekolah-label"
                                placeholder="Nama Sekolah"
                                aria-label="Nama Sekolah"
                                value="{{ $school->name }}"
                                aria-describedby="nama-sekolah" />
                            </div>
                          </div>
                        </div>
                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-npsn">NPSN</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-npsn2" class="input-group-text"
                                ><i class="icon-base bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-npsn"
                                class="form-control"
                                placeholder="NPSN"
                                aria-label="NPSN"
                                value="{{ $school->npsn }}"
                                aria-describedby="basic-icon-default-npsn2" />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-akreditasi">Akreditasi</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-akreditasi2" class="input-group-text"
                                ><i class="icon-base bx bx-buildings"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-akreditasi"
                                class="form-control"
                                placeholder="Akreditasi"
                                aria-label="Akreditasi"
                                value="{{ $school->accreditation }}"
                                aria-describedby="basic-icon-default-akreditasi2" />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-address">Alamat</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-address2" class="input-group-text"
                                ><i class="icon-base bx bx-comment"></i
                              ></span>
                              <textarea
                                id="basic-icon-default-address"
                                class="form-control"
                                placeholder="Alamat"
                                aria-label="Alamat"
                                aria-describedby="basic-icon-default-address2">{{ $school->address }}</textarea>
                            </div>
                          </div>
                        </div>


                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-phone">No Telepon</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="basic-icon-default-phone2" class="input-group-text"
                                ><i class="icon-base bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                id="basic-icon-default-phone"
                                class="form-control phone-mask"
                                placeholder="no telepon"
                                aria-label="no telepon"
                                value="{{ $school->phone }}"
                                aria-describedby="basic-icon-default-phone2" />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="icon-base bx bx-envelope"></i></span>
                              <input
                                type="text"
                                id="basic-icon-default-email"
                                class="form-control"
                                placeholder="Email"
                                aria-label="Email"
                                value="{{ $school->email }}"
                                aria-describedby="basic-icon-default-email2" />
                              <span id="basic-icon-default-email2" class="input-group-text">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>

                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="school_level">Tingkat</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="school_level2" class="input-group-text"
                                ><i class="icon-base bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                id="school_level"
                                class="form-control phone-mask"
                                placeholder="no telepon"
                                aria-label="no telepon"
                                value="{{ $school->school_level }}"
                                aria-describedby="school_level2" />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-6">
                          <label class="col-sm-2 col-form-label" for="status">Status</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span id="status2" class="input-group-text"
                                ><i class="icon-base bx bx-phone"></i
                              ></span>
                              <input
                                type="text"
                                id="status"
                                class="form-control phone-mask"
                                placeholder="no telepon"
                                aria-label="no telepon"
                                value="{{ $school->status }}"
                                aria-describedby="status2" />
                            </div>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
    </div>
@endsection

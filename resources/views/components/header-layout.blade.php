<div class="container-fluid px-4" style="color: black">
    <h1 class="mt-4">{{ $name ?? $slot }}</h1>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Karyawan/Presensi</li>
    </ol>

    <div class="row">
      <div class="col-xl-3 col-md-6">
          <div class="card bg-primary text-white mb-4">
              <div class="card-body">Presensi</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="/karyawan/presensi">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-warning text-white mb-4">
              <div class="card-body">Ajukan Ijin</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="/karyawan/ijin">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-success text-white mb-4">
              <div class="card-body">Ajukan Cuti</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="/karyawan/cuti">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
      <div class="col-xl-3 col-md-6">
          <div class="card bg-danger text-white mb-4">
              <div class="card-body">Riwayat</div>
              <div class="card-footer d-flex align-items-center justify-content-between">
                  <a class="small text-white stretched-link" href="/karyawan/riwayat">View Details</a>
                  <div class="small text-white"><i class="fas fa-angle-right"></i></div>
              </div>
          </div>
      </div>
    </div>
</div>
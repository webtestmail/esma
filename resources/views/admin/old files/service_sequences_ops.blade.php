@extends('admin.layouts.main-layout')
@section('title', "Services Sequence Management")
@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <!-- Hoverable Table rows -->
        <div class="card">
            <form action="{{ route('save.services.sequence') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="card-header">Manage Services Sequence
                    <span class="float-end me-2">
                        <a href="{{ route('manage_services') }}" class="btn btn-icon rounded-pill btn-outline-secondary float-end"><i class='bx bx-left-arrow-alt' style="font-size: 1.7rem;"></i></a>
                        <button type="submit" class="btn btn-success float-end me-2">Save Sequence</button>
                    </span>
                </h5>
                <div class="table-responsive text-nowrap px-4 pb-4">
                    <table id="services_table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Service Name</th>
                                <th>Current Position</th>
                                <th>New Position</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @php $sno = 1; @endphp
                            @foreach($servicesData as $service)
                                <tr>
                                    <td>
                                        <input type="hidden" name="service_ids[]" value="{{ $service->encrypted_id }}">{{ $sno }}
                                    </td>
                                    <td>
                                        <strong>{{ $service->service_name }}</strong>
                                    </td>
                                    <td>{{ $service->position_order }}</td>
                                    <td>{{ $service->position_order }}</td>
                                </tr>
                                @php $sno++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
</div>
@endsection
@section('admin-custom-js')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const addRow = document.getElementById("services_table");
        const tbody = addRow.querySelector("tbody");
        let draggedRow = null;
        function initializeDragAndDrop() {
            tbody.querySelectorAll("tr").forEach(row => {
                row.setAttribute("draggable", true);
                row.addEventListener("dragstart", function () {
                    draggedRow = row;
                    row.classList.add("select");
                });
                row.addEventListener("dragover", function (e) {
                    e.preventDefault(); // Allow the drop event
                });
                row.addEventListener("drop", function (e) {
                    e.preventDefault();
                    if (draggedRow !== this) {
                        const rows = Array.from(tbody.querySelectorAll("tr"));
                        const currentIndex = rows.indexOf(this);
                        const draggedIndex = rows.indexOf(draggedRow);
                        if (draggedIndex < currentIndex) {
                            this.after(draggedRow);
                        } else {
                            this.before(draggedRow);
                        }
                        updateSequence();
                    }
                });
                row.addEventListener("dragend", function () {
                    row.classList.remove("select");
                });
            });
        }
        function updateSequence() {
            const rows = tbody.querySelectorAll("tr");
            rows.forEach((row, index) => {
                const td = row.querySelectorAll("td")[3];
                td.innerHTML = `<input type="hidden" id="sequences" name="sequences[]" readonly value="${index + 1}">${index + 1}`;
            });
            // Handle the case where only one row is present
            if (rows.length === 1) {
                const singleRow = rows[0];
                const td = singleRow.querySelectorAll("td")[3];
                td.innerHTML = `<input type="hidden" id="sequences" name="sequences[]" readonly value="1">1`;
            }
        }
        initializeDragAndDrop();
        updateSequence();
        // Reinitialize drag-and-drop after AJAX updates
        document.addEventListener("ajaxContentLoaded", function () {
            initializeDragAndDrop();
            updateSequence(); // Ensure sequence is updated after AJAX
        });
    });
</script>
<script>
    $("#services_table").DataTable();
</script>
@endsection
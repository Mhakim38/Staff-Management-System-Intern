<x-app-layout>

    <x-slot name="header">

        <div class="dashboard-header">

            <div>
                <p class="dashboard-eyebrow">STAFFHUB</p>

                <h2>Leave Management</h2>

                <p class="dashboard-header-text">
                    View your leave balance and track your applications.
                </p>
            </div>


            <a
                href="{{ route('leave.create') }}"
                class="btn btn-primary"
            >
                <i class="fa-solid fa-plus"></i>
                Apply Leave
            </a>

        </div>

    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">

            @if(session('success'))

                <div class="success-message">
                    <i class="fa-solid fa-circle-check"></i>

                    {{ session('success') }}
                </div>

            @endif


            {{-- =====================================================
                 LEAVE OVERVIEW
            ===================================================== --}}
            <div class="leave-section-heading">

                <div>
                    <h2>Leave Overview</h2>

                    <p>
                        A quick overview of your current leave information.
                    </p>
                </div>

            </div>


            <div class="leave-overview-grid">

                <div class="leave-overview-card">

                    <div class="leave-overview-icon blue">
                        <i class="fa-solid fa-umbrella-beach"></i>
                    </div>

                    <div>
                        <span>Annual Leave</span>
                        <strong>12</strong>
                        <small>Days available</small>
                    </div>

                </div>


                <div class="leave-overview-card">

                    <div class="leave-overview-icon green">
                        <i class="fa-solid fa-notes-medical"></i>
                    </div>

                    <div>
                        <span>Medical Leave</span>
                        <strong>14</strong>
                        <small>Days available</small>
                    </div>

                </div>


                <div class="leave-overview-card">

                    <div class="leave-overview-icon orange">
                        <i class="fa-regular fa-clock"></i>
                    </div>

                    <div>
                        <span>Pending</span>

                        <strong>
                            {{ $leaves->where('status', 'Pending')->count() }}
                        </strong>

                        <small>Applications</small>
                    </div>

                </div>


                <div class="leave-overview-card">

                    <div class="leave-overview-icon purple">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>

                    <div>
                        <span>Approved</span>

                        <strong>
                            {{ $leaves->where('status', 'Approved')->count() }}
                        </strong>

                        <small>Applications</small>
                    </div>

                </div>

            </div>


            {{-- =====================================================
                 REQUEST HISTORY
            ===================================================== --}}
            <div class="dashboard-panel leave-history-panel">

                <div class="leave-history-header">

                    <div>

                        <h2>My Leave Requests</h2>

                        <p>
                            Review and track all your submitted applications.
                        </p>

                    </div>


                    <div class="leave-request-count">

                        <i class="fa-regular fa-file-lines"></i>

                        {{ $leaves->count() }}

                        {{ $leaves->count() === 1 ? 'Request' : 'Requests' }}

                    </div>

                </div>


                {{-- FILTERS --}}
                <div class="leave-filter-tabs">

                    <button
                        type="button"
                        class="leave-filter active"
                        data-filter="all"
                    >
                        All
                    </button>

                    <button
                        type="button"
                        class="leave-filter"
                        data-filter="pending"
                    >
                        Pending
                    </button>

                    <button
                        type="button"
                        class="leave-filter"
                        data-filter="approved"
                    >
                        Approved
                    </button>

                    <button
                        type="button"
                        class="leave-filter"
                        data-filter="rejected"
                    >
                        Rejected
                    </button>

                </div>


                <div class="leave-table-wrapper">

                    <table class="leave-table leave-history-table">

                        <thead>

                            <tr>
                                <th>Leave Type</th>
                                <th>Duration</th>
                                <th>Days</th>
                                <th>Applied On</th>
                                <th>Reason</th>
                                <th>Status</th>
                            </tr>

                        </thead>


                        <tbody>

                            @forelse($leaves as $leave)

                                <tr
                                    class="leave-request-row"
                                    data-status="{{ strtolower($leave->status) }}"
                                >

                                    <td>

                                        <div class="leave-type-cell">

                                            <div class="leave-type-icon">

                                                @if($leave->leave_type === 'Medical Leave')

                                                    <i class="fa-solid fa-notes-medical"></i>

                                                @elseif($leave->leave_type === 'Emergency Leave')

                                                    <i class="fa-solid fa-triangle-exclamation"></i>

                                                @elseif($leave->leave_type === 'Unpaid Leave')

                                                    <i class="fa-solid fa-wallet"></i>

                                                @else

                                                    <i class="fa-solid fa-umbrella-beach"></i>

                                                @endif

                                            </div>


                                            <div>
                                                <strong>
                                                    {{ $leave->leave_type }}
                                                </strong>

                                                <span>Full Day</span>
                                            </div>

                                        </div>

                                    </td>


                                    <td>

                                        <div class="leave-date-cell">

                                            <strong>
                                                {{ $leave->start_date->format('d M Y') }}
                                            </strong>

                                            @if(
                                                !$leave->start_date
                                                    ->isSameDay($leave->end_date)
                                            )

                                                <span>
                                                    to
                                                    {{ $leave->end_date->format('d M Y') }}
                                                </span>

                                            @else

                                                <span>Single day</span>

                                            @endif

                                        </div>

                                    </td>


                                    <td>

                                        <span class="leave-days-badge">
                                            {{ $leave->total_days }}
                                            {{ $leave->total_days == 1 ? 'day' : 'days' }}
                                        </span>

                                    </td>


                                    <td>

                                        <div class="leave-date-cell">

                                            <strong>
                                                {{ $leave->created_at->format('d M Y') }}
                                            </strong>

                                            <span>
                                                {{ $leave->created_at->format('h:i A') }}
                                            </span>

                                        </div>

                                    </td>


                                    <td>

                                        <div
                                            class="leave-reason"
                                            title="{{ $leave->reason }}"
                                        >
                                            {{ \Illuminate\Support\Str::limit(
                                                $leave->reason,
                                                45
                                            ) }}
                                        </div>

                                    </td>


                                    <td>

                                        <span class="status
                                            @if($leave->status === 'Approved')
                                                status-approved
                                            @elseif($leave->status === 'Rejected')
                                                status-rejected
                                            @else
                                                status-pending
                                            @endif
                                        ">

                                            @if($leave->status === 'Approved')
                                                <i class="fa-solid fa-check"></i>
                                            @elseif($leave->status === 'Rejected')
                                                <i class="fa-solid fa-xmark"></i>
                                            @else
                                                <i class="fa-regular fa-clock"></i>
                                            @endif

                                            {{ $leave->status }}

                                        </span>

                                    </td>

                                </tr>


                            @empty

                                <tr id="initialEmptyRow">

                                    <td
                                        colspan="6"
                                        class="empty-table"
                                    >

                                        <div class="leave-empty-icon">
                                            <i class="fa-regular fa-calendar-xmark"></i>
                                        </div>

                                        <strong>
                                            No leave requests yet
                                        </strong>

                                        <span>
                                            When you submit a leave request,
                                            it will appear here.
                                        </span>

                                        <a
                                            href="{{ route('leave.create') }}"
                                            class="btn btn-primary"
                                        >
                                            <i class="fa-solid fa-plus"></i>
                                            Apply Leave
                                        </a>

                                    </td>

                                </tr>

                            @endforelse


                            @if($leaves->isNotEmpty())

                                <tr
                                    id="filterEmptyRow"
                                    style="display:none;"
                                >

                                    <td
                                        colspan="6"
                                        class="empty-table"
                                    >

                                        <div class="leave-empty-icon">
                                            <i class="fa-solid fa-filter-circle-xmark"></i>
                                        </div>

                                        <strong>
                                            No matching requests
                                        </strong>

                                        <span>
                                            There are no leave applications
                                            with this status.
                                        </span>

                                    </td>

                                </tr>

                            @endif

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- INFO --}}
            <div class="leave-info-card">

                <div class="leave-info-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>

                    <strong>About leave requests</strong>

                    <p>
                        New applications are submitted with a Pending status.
                        Once reviewed by an administrator, the status can be
                        updated to Approved or Rejected.
                    </p>

                </div>

            </div>

        </div>

    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const filters =
                document.querySelectorAll('.leave-filter');

            const rows =
                document.querySelectorAll('.leave-request-row');

            const emptyRow =
                document.getElementById('filterEmptyRow');


            filters.forEach(function (button) {

                button.addEventListener('click', function () {

                    const selectedFilter =
                        this.dataset.filter;


                    filters.forEach(function (item) {
                        item.classList.remove('active');
                    });


                    this.classList.add('active');


                    let visibleRows = 0;


                    rows.forEach(function (row) {

                        const status =
                            row.dataset.status;


                        if (
                            selectedFilter === 'all' ||
                            status === selectedFilter
                        ) {

                            row.style.display = '';
                            visibleRows++;

                        } else {

                            row.style.display = 'none';

                        }

                    });


                    if (emptyRow) {

                        emptyRow.style.display =
                            visibleRows === 0
                                ? ''
                                : 'none';

                    }

                });

            });

        });

    </script>

</x-app-layout>
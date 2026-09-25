<x-app-layout>

    <x-slot name="header">
        <div class="dashboard-header">

            <div>
                <p class="dashboard-eyebrow">STAFFHUB</p>

                <h2>Apply Leave</h2>

                <p class="dashboard-header-text">
                    Submit a new leave application for approval.
                </p>
            </div>

            <a href="{{ route('leave.index') }}" class="leave-header-btn">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Leave History
            </a>

        </div>
    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">

            {{-- =====================================================
                 LEAVE BALANCE
            ===================================================== --}}
            <div class="leave-balance-grid">

                <div class="leave-balance-card">
                    <div class="leave-balance-icon blue">
                        <i class="fa-solid fa-umbrella-beach"></i>
                    </div>

                    <div>
                        <span>Annual Leave</span>
                        <strong>12 Days</strong>
                        <small>Available balance</small>
                    </div>
                </div>


                <div class="leave-balance-card">
                    <div class="leave-balance-icon green">
                        <i class="fa-solid fa-notes-medical"></i>
                    </div>

                    <div>
                        <span>Medical Leave</span>
                        <strong>14 Days</strong>
                        <small>Available balance</small>
                    </div>
                </div>


                <div class="leave-balance-card">
                    <div class="leave-balance-icon orange">
                        <i class="fa-regular fa-clock"></i>
                    </div>

                    <div>
                        <span>Pending Requests</span>
                        <strong>1 Request</strong>
                        <small>Waiting for approval</small>
                    </div>
                </div>

            </div>


            {{-- =====================================================
                 FORM
            ===================================================== --}}
            <div class="dashboard-panel leave-application-panel">

                <div class="leave-form-heading">

                    <div class="leave-heading-icon">
                        <i class="fa-regular fa-calendar-plus"></i>
                    </div>

                    <div>
                        <h2>Leave Application</h2>

                        <p>
                            Complete the information below to submit
                            your leave request.
                        </p>
                    </div>

                </div>


                @if ($errors->any())
                    <div class="form-error-box">

                        <div class="leave-message-heading">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            Please check your application
                        </div>

                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                    </div>
                @endif


                <form
                    method="POST"
                    action="{{ route('leave.store') }}"
                    class="staff-form"
                    id="leaveForm"
                >

                    @csrf


                    {{-- BASIC INFORMATION --}}
                    <div class="leave-form-section">

                        <div class="leave-form-section-title">
                            <span>01</span>

                            <div>
                                <h3>Leave Information</h3>
                                <p>Select your leave type and duration.</p>
                            </div>
                        </div>


                        <div class="staff-form-row">

                            <div class="staff-form-group">

                                <label for="leave_type">
                                    Leave Type
                                    <span class="required">*</span>
                                </label>

                                <div class="leave-input-wrap">
                                    <i class="fa-regular fa-calendar"></i>

                                    <select
                                        id="leave_type"
                                        name="leave_type"
                                        required
                                    >
                                        <option value="">
                                            Select leave type
                                        </option>

                                        <option
                                            value="Annual Leave"
                                            @selected(old('leave_type') === 'Annual Leave')
                                        >
                                            Annual Leave
                                        </option>

                                        <option
                                            value="Medical Leave"
                                            @selected(old('leave_type') === 'Medical Leave')
                                        >
                                            Medical Leave
                                        </option>

                                        <option
                                            value="Emergency Leave"
                                            @selected(old('leave_type') === 'Emergency Leave')
                                        >
                                            Emergency Leave
                                        </option>

                                        <option
                                            value="Unpaid Leave"
                                            @selected(old('leave_type') === 'Unpaid Leave')
                                        >
                                            Unpaid Leave
                                        </option>
                                    </select>
                                </div>

                            </div>


                            <div class="staff-form-group">

                                <label>
                                    Leave Duration
                                </label>

                                <div class="leave-input-wrap leave-disabled-input">
                                    <i class="fa-regular fa-clock"></i>

                                    <input
                                        type="text"
                                        value="Full Day"
                                        readonly
                                    >
                                </div>

                                <small>
                                    Half-day support can be added later.
                                </small>

                            </div>

                        </div>


                        <div class="staff-form-row">

                            <div class="staff-form-group">

                                <label for="start_date">
                                    Start Date
                                    <span class="required">*</span>
                                </label>

                                <div class="leave-input-wrap">
                                    <i class="fa-regular fa-calendar-days"></i>

                                    <input
                                        type="date"
                                        id="start_date"
                                        name="start_date"
                                        value="{{ old('start_date') }}"
                                        required
                                    >
                                </div>

                            </div>


                            <div class="staff-form-group">

                                <label for="end_date">
                                    End Date
                                    <span class="required">*</span>
                                </label>

                                <div class="leave-input-wrap">
                                    <i class="fa-regular fa-calendar-check"></i>

                                    <input
                                        type="date"
                                        id="end_date"
                                        name="end_date"
                                        value="{{ old('end_date') }}"
                                        required
                                    >
                                </div>

                            </div>

                        </div>


                        {{-- LIVE SUMMARY --}}
                        <div class="leave-summary-box">

                            <div class="leave-summary-title">
                                <i class="fa-solid fa-chart-simple"></i>

                                <div>
                                    <strong>Leave Summary</strong>
                                    <span>
                                        Summary based on your selected dates
                                    </span>
                                </div>
                            </div>


                            <div class="leave-summary-values">

                                <div>
                                    <span>Total Days</span>
                                    <strong id="totalDays">—</strong>
                                </div>

                                <div>
                                    <span>Current Balance</span>
                                    <strong>12 Days</strong>
                                </div>

                                <div>
                                    <span>Balance After Leave</span>
                                    <strong id="remainingBalance">—</strong>
                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- REASON --}}
                    <div class="leave-form-section">

                        <div class="leave-form-section-title">
                            <span>02</span>

                            <div>
                                <h3>Reason for Leave</h3>
                                <p>Provide a brief reason for your application.</p>
                            </div>
                        </div>


                        <div class="staff-form-group">

                            <label for="reason">
                                Reason
                                <span class="required">*</span>
                            </label>

                            <textarea
                                id="reason"
                                name="reason"
                                rows="5"
                                maxlength="1000"
                                placeholder="Please provide a brief reason for your leave request..."
                                required
                            >{{ old('reason') }}</textarea>

                            <div class="leave-field-note">
                                <span>
                                    Please provide sufficient information
                                    for the administrator.
                                </span>

                                <span id="reasonCounter">0 / 1000</span>
                            </div>

                        </div>

                    </div>


                    {{-- SUPPORTING DOCUMENT --}}
                    <div class="leave-form-section">

                        <div class="leave-form-section-title">
                            <span>03</span>

                            <div>
                                <h3>Supporting Document</h3>

                                <p>
                                    Attach supporting documents when required.
                                </p>
                            </div>
                        </div>


                        <div class="leave-upload-placeholder">

                            <div class="leave-upload-icon">
                                <i class="fa-solid fa-paperclip"></i>
                            </div>

                            <div>
                                <strong>
                                    Supporting document
                                </strong>

                                <p>
                                    Document upload will be available
                                    once attachment storage is enabled.
                                </p>
                            </div>

                            <span class="leave-coming-soon">
                                Coming Soon
                            </span>

                        </div>

                    </div>


                    {{-- NOTICE --}}
                    <div class="leave-notice">

                        <i class="fa-solid fa-circle-info"></i>

                        <div>
                            <strong>Before submitting</strong>

                            <p>
                                Your request will be sent to the administrator
                                for review. You can track its status from
                                Leave History.
                            </p>
                        </div>

                    </div>


                    <div class="staff-form-actions">

                        <a
                            href="{{ route('dashboard') }}"
                            class="btn staff-btn-secondary"
                        >
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >
                            <i class="fa-solid fa-paper-plane"></i>
                            Submit Request
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const startDate = document.getElementById('start_date');
            const endDate = document.getElementById('end_date');

            const totalDays =
                document.getElementById('totalDays');

            const remainingBalance =
                document.getElementById('remainingBalance');

            const reason =
                document.getElementById('reason');

            const reasonCounter =
                document.getElementById('reasonCounter');

            const annualBalance = 12;


            function calculateLeaveDays() {

                if (!startDate.value || !endDate.value) {
                    totalDays.textContent = '—';
                    remainingBalance.textContent = '—';
                    return;
                }

                const start =
                    new Date(startDate.value + 'T00:00:00');

                const end =
                    new Date(endDate.value + 'T00:00:00');


                if (end < start) {
                    totalDays.textContent = 'Invalid';
                    remainingBalance.textContent = '—';
                    return;
                }


                const difference =
                    end.getTime() - start.getTime();

                const days =
                    Math.floor(
                        difference / (1000 * 60 * 60 * 24)
                    ) + 1;


                totalDays.textContent =
                    days + (days === 1 ? ' Day' : ' Days');


                const remaining =
                    annualBalance - days;

                remainingBalance.textContent =
                    remaining >= 0
                        ? remaining + ' Days'
                        : 'Insufficient';

            }


            function updateReasonCounter() {
                reasonCounter.textContent =
                    reason.value.length + ' / 1000';
            }


            startDate.addEventListener(
                'change',
                calculateLeaveDays
            );

            endDate.addEventListener(
                'change',
                calculateLeaveDays
            );

            reason.addEventListener(
                'input',
                updateReasonCounter
            );


            calculateLeaveDays();
            updateReasonCounter();

        });
    </script>

</x-app-layout>
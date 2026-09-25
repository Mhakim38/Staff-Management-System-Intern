<x-app-layout>

    <x-slot name="header">

        <div class="dashboard-header">

            <div>
                <p class="dashboard-eyebrow">STAFFHUB</p>

                <h2>Announcements</h2>

                <p class="dashboard-header-text">
                    Stay updated with workplace news, notices and important information.
                </p>
            </div>

            <div class="announcement-header-count">
                <i class="fa-solid fa-bullhorn"></i>

                <span>
                    {{ count($announcements) }}
                    {{ count($announcements) === 1 ? 'Announcement' : 'Announcements' }}
                </span>
            </div>

        </div>

    </x-slot>


    <div class="dashboard-page">

        <div class="dashboard-container">


            {{-- =====================================================
                 ANNOUNCEMENT OVERVIEW
            ====================================================== --}}

            <div class="announcement-overview">

                <div class="announcement-overview-icon">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>

                <div class="announcement-overview-content">

                    <div>
                        <span>Announcement Centre</span>

                        <h3>
                            Keep up with the latest workplace updates
                        </h3>

                        <p>
                            Important company information, reminders and
                            notices will be displayed here.
                        </p>
                    </div>

                    <div class="announcement-overview-total">
                        <strong>{{ count($announcements) }}</strong>
                        <span>Total Announcements</span>
                    </div>

                </div>

            </div>


            {{-- =====================================================
                 SEARCH & FILTER
            ====================================================== --}}

            <div class="announcement-toolbar">

                <div class="announcement-search">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input
                        type="text"
                        id="announcementSearch"
                        placeholder="Search announcements..."
                    >

                </div>


                <div class="announcement-filter-wrap">

                    <i class="fa-solid fa-filter"></i>

                    <select id="announcementCategoryFilter">

                        <option value="all">
                            All Categories
                        </option>

                        @foreach(
                            collect($announcements)
                                ->pluck('category')
                                ->unique()
                                ->filter()
                            as $category
                        )

                            <option value="{{ strtolower($category) }}">
                                {{ $category }}
                            </option>

                        @endforeach

                    </select>

                </div>

            </div>


            {{-- =====================================================
                 SECTION HEADING
            ====================================================== --}}

            <div class="announcement-section-header">

                <div>
                    <h2>Latest Announcements</h2>

                    <p>
                        Browse workplace notices and company updates.
                    </p>
                </div>

                <div class="announcement-result-count">
                    <span id="announcementVisibleCount">
                        {{ count($announcements) }}
                    </span>

                    <span>shown</span>
                </div>

            </div>


            {{-- =====================================================
                 ANNOUNCEMENTS
            ====================================================== --}}

            <div
                class="announcement-list"
                id="announcementList"
            >

                @forelse($announcements as $announcement)

                    @php

                        $category =
                            strtolower($announcement['category'] ?? 'general');

                        $categoryClass = match($category) {
                            'important' => 'important',
                            'urgent' => 'urgent',
                            'event' => 'event',
                            'hr' => 'hr',
                            'system' => 'system',
                            default => 'general'
                        };

                    @endphp


                    <article
                        class="announcement-item"
                        data-category="{{ $category }}"
                        data-search="{{ strtolower(
                            ($announcement['title'] ?? '') . ' ' .
                            ($announcement['message'] ?? '') . ' ' .
                            ($announcement['category'] ?? '')
                        ) }}"
                    >

                        {{-- CATEGORY STRIPE --}}
                        <div class="announcement-stripe {{ $categoryClass }}">
                        </div>


                        {{-- ICON --}}
                        <div class="announcement-main-icon {{ $categoryClass }}">

                            @if($category === 'urgent')

                                <i class="fa-solid fa-triangle-exclamation"></i>

                            @elseif($category === 'important')

                                <i class="fa-solid fa-circle-exclamation"></i>

                            @elseif($category === 'event')

                                <i class="fa-regular fa-calendar-check"></i>

                            @elseif($category === 'hr')

                                <i class="fa-solid fa-users"></i>

                            @elseif($category === 'system')

                                <i class="fa-solid fa-gear"></i>

                            @else

                                <i class="fa-solid fa-bullhorn"></i>

                            @endif

                        </div>


                        {{-- CONTENT --}}
                        <div class="announcement-item-content">

                            <div class="announcement-item-top">

                                <span
                                    class="announcement-category-badge
                                           {{ $categoryClass }}"
                                >
                                    {{ $announcement['category'] ?? 'General' }}
                                </span>


                                <span class="announcement-item-date">

                                    <i class="fa-regular fa-calendar"></i>

                                    {{ $announcement['date'] ?? '-' }}

                                </span>

                            </div>


                            <h3>
                                {{ $announcement['title'] }}
                            </h3>


                            <p class="announcement-preview">
                                {{ \Illuminate\Support\Str::limit(
                                    $announcement['message'],
                                    180
                                ) }}
                            </p>


                            {{-- META INFORMATION --}}
                            <div class="announcement-meta">

                                <div class="announcement-meta-left">

                                    <span>
                                        <i class="fa-solid fa-building"></i>
                                        StaffHub Notice
                                    </span>

                                    <span>
                                        <i class="fa-solid fa-users"></i>
                                        All Staff
                                    </span>

                                </div>


                                <button
                                    type="button"
                                    class="announcement-view-btn"

                                    data-category="{{ $announcement['category'] ?? 'General' }}"
                                    data-title="{{ $announcement['title'] }}"
                                    data-date="{{ $announcement['date'] ?? '-' }}"
                                    data-message="{{ $announcement['message'] }}"
                                >

                                    View Details

                                    <i class="fa-solid fa-arrow-right"></i>

                                </button>

                            </div>

                        </div>

                    </article>


                @empty

                    <div class="announcement-empty">

                        <div class="announcement-empty-icon">
                            <i class="fa-regular fa-bell-slash"></i>
                        </div>

                        <h3>No announcements yet</h3>

                        <p>
                            There are currently no workplace announcements
                            available.
                        </p>

                    </div>

                @endforelse


                {{-- FILTER EMPTY STATE --}}

                <div
                    class="announcement-empty"
                    id="announcementFilterEmpty"
                    style="display: none;"
                >

                    <div class="announcement-empty-icon">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>

                    <h3>No announcements found</h3>

                    <p>
                        Try using a different keyword or category.
                    </p>

                </div>

            </div>


            {{-- =====================================================
                 INFORMATION
            ====================================================== --}}

            <div class="announcement-info-box">

                <div class="announcement-info-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>
                    <strong>About Announcements</strong>

                    <p>
                        This section contains official workplace notices,
                        updates and reminders. Check this page regularly
                        to stay informed about company activities and
                        important information.
                    </p>
                </div>

            </div>

        </div>

    </div>



    {{-- =========================================================
         ANNOUNCEMENT DETAILS MODAL
    ========================================================== --}}

    <div
        class="announcement-modal"
        id="announcementModal"
        aria-hidden="true"
    >

        <div class="announcement-modal-backdrop"></div>


        <div class="announcement-modal-card">

            <div class="announcement-modal-header">

                <div class="announcement-modal-heading">

                    <div class="announcement-modal-icon">
                        <i class="fa-solid fa-bullhorn"></i>
                    </div>

                    <div>
                        <span
                            class="announcement-category-badge general"
                            id="modalCategory"
                        >
                            General
                        </span>

                        <h2 id="modalTitle">
                            Announcement
                        </h2>
                    </div>

                </div>


                <button
                    type="button"
                    class="announcement-modal-close"
                    id="closeAnnouncementModal"
                >
                    <i class="fa-solid fa-xmark"></i>
                </button>

            </div>


            <div class="announcement-modal-meta">

                <span>
                    <i class="fa-regular fa-calendar"></i>
                    <span id="modalDate"></span>
                </span>

                <span>
                    <i class="fa-solid fa-building"></i>
                    StaffHub Notice
                </span>

                <span>
                    <i class="fa-solid fa-users"></i>
                    All Staff
                </span>

            </div>


            <div class="announcement-modal-body">

                <h4>Announcement Details</h4>

                <p id="modalMessage"></p>

            </div>


            <div class="announcement-modal-notice">

                <i class="fa-solid fa-circle-info"></i>

                <p>
                    This announcement is provided through the
                    StaffHub Announcement Centre.
                </p>

            </div>


            <div class="announcement-modal-footer">

                <button
                    type="button"
                    class="btn staff-btn-secondary"
                    id="closeAnnouncementModalBottom"
                >
                    Close
                </button>

            </div>

        </div>

    </div>



    {{-- =========================================================
         JAVASCRIPT
    ========================================================== --}}

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            /* =====================================================
               SEARCH / FILTER
            ===================================================== */

            const searchInput =
                document.getElementById('announcementSearch');

            const categoryFilter =
                document.getElementById('announcementCategoryFilter');

            const items =
                document.querySelectorAll('.announcement-item');

            const visibleCount =
                document.getElementById('announcementVisibleCount');

            const filterEmpty =
                document.getElementById('announcementFilterEmpty');


            function filterAnnouncements() {

                const keyword =
                    searchInput.value
                        .toLowerCase()
                        .trim();

                const category =
                    categoryFilter.value;


                let count = 0;


                items.forEach(function (item) {

                    const searchText =
                        item.dataset.search || '';

                    const itemCategory =
                        item.dataset.category || 'general';


                    const matchesSearch =
                        searchText.includes(keyword);

                    const matchesCategory =
                        category === 'all' ||
                        itemCategory === category;


                    if (matchesSearch && matchesCategory) {

                        item.style.display = '';
                        count++;

                    } else {

                        item.style.display = 'none';

                    }

                });


                visibleCount.textContent = count;


                if (filterEmpty) {

                    filterEmpty.style.display =
                        count === 0 && items.length > 0
                            ? 'block'
                            : 'none';

                }

            }


            searchInput.addEventListener(
                'input',
                filterAnnouncements
            );

            categoryFilter.addEventListener(
                'change',
                filterAnnouncements
            );



            /* =====================================================
               MODAL
            ===================================================== */

            const modal =
                document.getElementById('announcementModal');

            const modalCategory =
                document.getElementById('modalCategory');

            const modalTitle =
                document.getElementById('modalTitle');

            const modalDate =
                document.getElementById('modalDate');

            const modalMessage =
                document.getElementById('modalMessage');

            const viewButtons =
                document.querySelectorAll('.announcement-view-btn');

            const closeButton =
                document.getElementById('closeAnnouncementModal');

            const closeBottom =
                document.getElementById('closeAnnouncementModalBottom');

            const backdrop =
                modal.querySelector('.announcement-modal-backdrop');


            function openModal(button) {

                const category =
                    button.dataset.category || 'General';

                const categoryClass =
                    category.toLowerCase();


                modalCategory.textContent = category;

                modalCategory.className =
                    'announcement-category-badge ' +
                    categoryClass;


                modalTitle.textContent =
                    button.dataset.title;

                modalDate.textContent =
                    button.dataset.date;

                modalMessage.textContent =
                    button.dataset.message;


                modal.classList.add('active');

                modal.setAttribute(
                    'aria-hidden',
                    'false'
                );

                document.body.style.overflow = 'hidden';

            }


            function closeModal() {

                modal.classList.remove('active');

                modal.setAttribute(
                    'aria-hidden',
                    'true'
                );

                document.body.style.overflow = '';

            }


            viewButtons.forEach(function (button) {

                button.addEventListener('click', function () {
                    openModal(this);
                });

            });


            closeButton.addEventListener(
                'click',
                closeModal
            );

            closeBottom.addEventListener(
                'click',
                closeModal
            );

            backdrop.addEventListener(
                'click',
                closeModal
            );


            document.addEventListener('keydown', function (event) {

                if (
                    event.key === 'Escape' &&
                    modal.classList.contains('active')
                ) {
                    closeModal();
                }

            });

        });

    </script>

</x-app-layout>
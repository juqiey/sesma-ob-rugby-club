document.addEventListener('DOMContentLoaded', function () {

    const searchInput = document.getElementById('club_search');
    const clubIdInput = document.getElementById('club_id');
    const searchResults = document.getElementById('club_search_results');
    const searchUrlInput = document.getElementById('club_search_url');

    if (!searchInput || !clubIdInput || !searchResults || !searchUrlInput) {
        console.error('Club search elements not found.');
        return;
    }

    const searchUrl = searchUrlInput.value;

    let searchTimeout = null;


    // =========================================================
    // SEARCH CLUBS
    // =========================================================

    searchInput.addEventListener('input', function () {

        const query = this.value.trim();

        clearTimeout(searchTimeout);

        if (query.length < 2) {
            searchResults.innerHTML = '';
            searchResults.classList.add('d-none');
            return;
        }

        searchTimeout = setTimeout(function () {

            const url =
                searchUrl + '?q=' + encodeURIComponent(query);

            console.log('Searching:', url);

            fetch(url, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(async function (response) {

                console.log('HTTP Status:', response.status);

                const text = await response.text();

                console.log('Raw Response:', text);

                if (!response.ok) {
                    throw new Error(
                        `HTTP ${response.status}: ${text}`
                    );
                }

                try {
                    return JSON.parse(text);
                } catch (error) {
                    throw new Error(
                        'Response is not valid JSON.'
                    );
                }
            })
            .then(function (clubs) {

                console.log('Clubs:', clubs);

                searchResults.innerHTML = '';

                if (!Array.isArray(clubs)) {
                    throw new Error(
                        'Invalid response format.'
                    );
                }

                // No results
                if (clubs.length === 0) {

                    searchResults.innerHTML = `
                        <div class="p-3 text-center">

                            <p class="text-muted mb-2">
                                No clubs found.
                            </p>

                            <button
                                type="button"
                                class="btn btn-sm btn-outline-primary"
                                data-bs-toggle="modal"
                                data-bs-target="#registerClubModal"
                            >
                                <i class="ri-add-line me-1"></i>
                                Register a New Club
                            </button>

                        </div>
                    `;

                    searchResults.classList.remove('d-none');

                    return;
                }


                // Display search results
                clubs.forEach(function (club) {

                    const location = club.location ?? '';
                    const type = club.type ?? 'Club';

                    const result = document.createElement('button');

                    result.type = 'button';

                    result.className =
                        'w-100 text-start border-0 bg-transparent p-3';

                    result.innerHTML = `
                        <div class="d-flex align-items-center">

                            <div class="flex-shrink-0 me-3">

                                <div class="avatar-sm">

                                    <div class="avatar-title bg-primary-subtle text-primary rounded">

                                        <i class="ri-shield-line fs-4"></i>

                                    </div>

                                </div>

                            </div>


                            <div class="flex-grow-1">

                                <h6 class="mb-1">
                                    ${escapeHtml(club.name)}
                                </h6>

                                <p class="text-muted mb-0">

                                    ${escapeHtml(type)}

                                    ${
                                        location
                                            ? ` &bull; ${escapeHtml(location)}`
                                            : ''
                                    }

                                </p>

                            </div>


                            <div class="flex-shrink-0">

                                <i class="ri-arrow-right-s-line fs-5 text-muted"></i>

                            </div>

                        </div>
                    `;


                    result.addEventListener('click', function () {

                        selectClub(club);

                    });


                    searchResults.appendChild(result);

                });


                searchResults.classList.remove('d-none');

            })
            .catch(function (error) {

                console.error('CLUB SEARCH ERROR:', error);

                searchResults.innerHTML = `
                    <div class="p-3 text-danger">

                        <strong>
                            Unable to search clubs.
                        </strong>

                        <div class="small mt-1">
                            ${escapeHtml(error.message)}
                        </div>

                    </div>
                `;

                searchResults.classList.remove('d-none');

            });

        }, 300);

    });


    // =========================================================
    // SELECT CLUB
    // =========================================================

    function selectClub(club)
    {
        clubIdInput.value = club.id;

        searchInput.value = club.name;

        searchResults.innerHTML = '';

        searchResults.classList.add('d-none');

        showSelectedClub(club);
    }


    // =========================================================
    // SHOW SELECTED CLUB
    // =========================================================

    function showSelectedClub(club)
    {
        const selectedClubContainer =
            document.getElementById('selected_club');

        const selectedClubName =
            document.getElementById('selected_club_name');

        const selectedClubLocation =
            document.getElementById('selected_club_location');


        if (!selectedClubContainer) {
            return;
        }


        selectedClubName.textContent = club.name;


        const type = club.type ?? 'Club';
        const location = club.location ?? '';


        selectedClubLocation.textContent =
            `${type}${location ? ' • ' + location : ''}`;


        selectedClubContainer.classList.remove('d-none');
    }


    // =========================================================
    // CHANGE CLUB
    // =========================================================

    const changeClubButton =
        document.getElementById('change_club');


    if (changeClubButton) {

        changeClubButton.addEventListener('click', function () {

            clubIdInput.value = '';

            searchInput.value = '';

            const selectedClub =
                document.getElementById('selected_club');

            if (selectedClub) {
                selectedClub.classList.add('d-none');
            }

            searchResults.innerHTML = '';

            searchResults.classList.add('d-none');

            searchInput.focus();

        });

    }


    // =========================================================
    // ESCAPE HTML
    // =========================================================

    function escapeHtml(value)
    {
        const div = document.createElement('div');

        div.textContent = value ?? '';

        return div.innerHTML;
    }

});

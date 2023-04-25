<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="tasksList">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">All Customers</h5>
                        <div class="flex-shrink-0">
                        <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-danger add-btn" data-bs-toggle="modal" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Create Customer</button>
                                <button class="btn btn-soft-danger" id="remove-actions" onClick="deleteMultiple()"><i class="ri-delete-bin-2-line"></i></button>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <form>
                        <div class="row g-3">
                            <div class="col-xxl-5 col-sm-12">
                                <div class="search-box">
                                    <input type="text" class="form-control search bg-light border-light" placeholder="Search for tasks or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-4">
                                <input type="text" class="form-control bg-light border-light" id="demo-datepicker" data-provider="flatpickr" data-date-format="d M, Y" data-range-date="true" placeholder="Select date range">
                            </div>
                            <!--end col-->

                            <div class="col-xxl-3 col-sm-4">
                                <div class="input-light">
                                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default" id="idStatus">
                                        <option value="">Status</option>
                                        <option value="all" selected>All</option>
                                        <option value="New">New</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xxl-2 col-sm-4">
                                <div>
                                    <button type="button" class="btn btn-primary w-100">
                                        <i class="ri-search-line me-1 align-bottom"></i>
                                        Search
                                    </button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <!--end card-body-->
                <div class="card-body">
                    <div class="table-responsive table-card mb-4">
                        <table class="table align-middle table-nowrap mb-0" id="tasksTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th scope="col" style="width: 40px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th>
                                    <th class="sort" data-sort="id">ID</th>
                                    <th>Avatar</th>
                                    <th class="sort" data-sort="name">Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Orders</th>
                                    <th>Total Amount</th>
                                    <th>Register Date</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @for($i = 0; $i < 10; $i++)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                        </div>
                                    </th>
                                    <td class="id"><a href="apps-tasks-details.html" class="fw-medium link-primary">#VLZ50{{$i}}</a></td>
                                    <td class="avatar">
                                        <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">
                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xxs" />
                                        </a>
                                    </td>
                                    <td class="name">Elly Tran</td>
                                    <td class="email">test@gmail.com</td>
                                    <td class="phone">000-000-000</td>
                                    <td class="oders">10</td>
                                    <td class="total_amount">$200,000</td>
                                    <td class="register_date">25 Jan, 2022</td>
                                    <td class="address">California, United States, Zip-code: 90201</td>
                                    <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                    <td class="action">
                                        <ul class="list-inline hstack gap-2 mb-0">
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="View">
                                                <a href="#"
                                                    class="text-primary d-inline-block">
                                                    <i class="ri-eye-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                                <a href="#" class="text-primary d-inline-block edit-item-btn">
                                                    <i class="ri-pencil-fill fs-16"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item" data-bs-toggle="tooltip"
                                                data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                                <a class="text-danger d-inline-block remove-item-btn"
                                                    data-bs-toggle="modal" href="#deleteProduct">
                                                    <i class="ri-delete-bin-5-fill fs-16"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 200k+ tasks We did not find any tasks for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-2">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade flip" id="deleteOrder" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-5 text-center">
                    <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#405189,secondary:#f06548" style="width:90px;height:90px"></lord-icon>
                    <div class="mt-4 text-center">
                        <h4>You are about to delete a task ?</h4>
                        <p class="text-muted fs-14 mb-4">Deleting your task will remove all of
                            your information from our database.</p>
                        <div class="hstack gap-2 justify-content-center remove">
                            <button class="btn btn-link btn-ghost-success fw-medium text-decoration-none" id="deleteRecord-close" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Close</button>
                            <button class="btn btn-danger" id="delete-record">Yes, Delete It</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end delete modal -->

    <div class="modal fade zoomIn" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                </div>
                <form class="tablelist-form" autocomplete="off">
                    <div class="modal-body">
                        <input type="hidden" id="tasksId" />
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="projectName-field" class="form-label">Project Name</label>
                                <input type="text" id="projectName-field" class="form-control" placeholder="Project name" required />
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <div>
                                    <label for="tasksTitle-field" class="form-label">Title</label>
                                    <input type="text" id="tasksTitle-field" class="form-control" placeholder="Title" required />
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="clientName-field" class="form-label">Client Name</label>
                                <input type="text" id="clientName-field" class="form-control" placeholder="Client name" required />
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label class="form-label">Assigned To</label>
                                <div data-simplebar style="height: 95px;">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-2.jpg" id="james-forbes">
                                                <label class="form-check-label d-flex align-items-center" for="james-forbes">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">James Forbes</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-3.jpg" id="john-robles">
                                                <label class="form-check-label d-flex align-items-center" for="john-robles">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">John Robles</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-4.jpg" id="mary-gant">
                                                <label class="form-check-label d-flex align-items-center" for="mary-gant">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Mary Gant</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-1.jpg" id="curtis-saenz">
                                                <label class="form-check-label d-flex align-items-center" for="curtis-saenz">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Curtis Saenz</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-5.jpg" id="virgie-price">
                                                <label class="form-check-label d-flex align-items-center" for="virgie-price">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-5.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Virgie Price</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-10.jpg" id="anthony-mills">
                                                <label class="form-check-label d-flex align-items-center" for="anthony-mills">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-10.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Anthony Mills</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-6.jpg" id="marian-angel">
                                                <label class="form-check-label d-flex align-items-center" for="marian-angel">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Marian Angel</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-10.jpg" id="johnnie-walton">
                                                <label class="form-check-label d-flex align-items-center" for="johnnie-walton">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-7.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Johnnie Walton</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-8.jpg" id="donna-weston">
                                                <label class="form-check-label d-flex align-items-center" for="donna-weston">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-8.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Donna Weston</span>
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" name="assignedTo[]" value="avatar-9.jpg" id="diego-norris">
                                                <label class="form-check-label d-flex align-items-center" for="diego-norris">
                                                    <span class="flex-shrink-0">
                                                        <img src="assets/images/users/avatar-9.jpg" alt="" class="avatar-xxs rounded-circle">
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">Diego Norris</span>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="duedate-field" class="form-label">Due Date</label>
                                <input type="text" id="duedate-field" class="form-control" data-provider="flatpickr" placeholder="Due date" required />
                            </div>
                            <!--end col-->
                            <div class="col-lg-6">
                                <label for="ticket-status" class="form-label">Status</label>
                                <select class="form-control" data-choices data-choices-search-false id="ticket-status">
                                    <option value="">Status</option>
                                    <option value="New">New</option>
                                    <option value="Inprogress">Inprogress</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12">
                                <label for="priority-field" class="form-label">Priority</label>
                                <select class="form-control" data-choices data-choices-search-false id="priority-field">
                                    <option value="">Priority</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" id="close-modal" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Task</button>
                            <!-- <button type="button" class="btn btn-success" id="edit-btn">Update Task</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end modal-->
</div>

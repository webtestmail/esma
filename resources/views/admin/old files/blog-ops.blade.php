@extends('admin.layouts.admin-layout')

@section('page-content')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <form
            action="{{ !empty($blog->encrypted_id) ? route('admin.edit.blog', $blog->encrypted_id) : route('admin.add.blog') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="page-header sticky-top">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Blog</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.my-dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.manage_blogs') }}">All Blogs</a>
                        </li>
                        <li class="breadcrumb-item">Create/Edit</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            {{-- <a href="javascript:void(0);" class="btn btn-light-brand" data-bs-toggle="offcanvas"
                            data-bs-target="#proposalSent">
                            <i class="feather-layers me-2"></i>
                            <span>Save & Send</span>
                        </a> --}}
                            {{-- <a href="javascript:void(0);" class="btn btn-primary successAlertMessage">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </a> --}}
                            <button type="submit" class="btn btn-primary">
                                <i class="feather-save me-2"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-xl-12">
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @elseif (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="blog_tags" class="form-label">Blog Tags <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="blog_tags" name="blog_tags"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->blog_tags : old('blog_tags') }}"
                                        placeholder="Enter Tag(s)" />
                                    @error('blog_tags')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="blog_headline" class="form-label">Blog Headline <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="blog_headline" name="blog_headline"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->blog_headline : old('blog_headline') }}"
                                        placeholder="Enter Headline" onblur="getUrl(this.id)" />
                                    @error('blog_headline')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="blog_url" class="form-label">Blog URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="blog_url" name="blog_url"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->blog_url : old('blog_url') }}"
                                        placeholder="Enter URL" />
                                    @error('blog_url')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="short_description" class="form-label">Short Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Short Description">{{ !empty($blog->encrypted_id) ? htmlspecialchars_decode($blog->short_description) : old('short_description') }}</textarea>
                                    @error('short_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="written_by" class="form-label">Written By <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="written_by" name="written_by"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->written_by : old('written_by') }}"
                                        placeholder="Enter Name" />
                                    @error('written_by')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_designation" class="form-label">Writer Designation <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="writer_designation"
                                        name="writer_designation"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->writer_designation : old('writer_designation') }}"
                                        placeholder="Enter Designation" />
                                    @error('writer_designation')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_description" class="form-label">Writer Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="writer_description" id="writer_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Writer Description">{{ !empty($blog->encrypted_id) ? htmlspecialchars_decode($blog->writer_description) : old('writer_description') }}</textarea>
                                    @error('writer_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_instagram" class="form-label">Writer Instagram URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="writer_instagram"
                                        name="writer_instagram"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->writer_instagram : old('writer_instagram') }}"
                                        placeholder="Enter Link" />
                                    @error('writer_instagram')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_linkedin" class="form-label">Writer LinkedIn URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="writer_linkedin"
                                        name="writer_linkedin"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->writer_linkedin : old('writer_linkedin') }}"
                                        placeholder="Enter Link" />
                                    @error('writer_linkedin')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_x" class="form-label">Writer X URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="writer_x" name="writer_x"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->writer_x : old('writer_x') }}"
                                        placeholder="Enter Link" />
                                    @error('writer_x')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_personal" class="form-label">Writer Personal URL <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="writer_personal"
                                        name="writer_personal"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->writer_personal : old('writer_personal') }}"
                                        placeholder="Enter Link" />
                                    @error('writer_personal')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_title" class="form-label">Meta Title <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->meta_title : old('meta_title') }}"
                                        placeholder="Enter Title" />
                                    @error('meta_title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_keyword" class="form-label">Meta Keyword <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="meta_keyword" name="meta_keyword"
                                        value="{{ !empty($blog->encrypted_id) ? $blog->meta_keyword : old('meta_keyword') }}"
                                        placeholder="Enter Keywords" />
                                    @error('meta_keyword')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="meta_description" class="form-label">Meta Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="meta_description" id="meta_description" cols="30" rows="10" class="form-control"
                                        placeholder="Enter Meta Description">{{ !empty($blog->encrypted_id) ? htmlspecialchars_decode($blog->meta_description) : old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <div class="mb-4">
                                    <label for="breadcrumb_image" class="form-label">Breadcrumb Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($blog->encrypted_id) && !empty($blog->breadcrumb_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="breadcrumb_image">
                                                    <img src="{{ asset($blog->breadcrumb_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="breadcrumb_image"
                                        name="breadcrumb_image" accept="image/*" />
                                    @error('breadcrumb_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="blog_image" class="form-label">Blog Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($blog->encrypted_id) && !empty($blog->blog_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Blog_Image">
                                                    <img src="{{ asset($blog->blog_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="blog_image" name="blog_image"
                                        accept="image/*" />
                                    @error('blog_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="writer_image" class="form-label">Writer Image <span
                                            class="text-danger">*</span></label>
                                    @if (!empty($blog->encrypted_id) && !empty($blog->writer_image))
                                        <div class="my-3">
                                            <div class="img-group lh-0 ms-3 justify-content-start d-none d-sm-flex">
                                                <a href="javascript:void(0)" class="avatar-image avatar-md"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    title="Writer_Image">
                                                    <img src="{{ asset($blog->writer_image) }}" class="img-fluid"
                                                        alt="image" />
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    <input class="form-control" type="file" id="writer_image" name="writer_image"
                                        accept="image/*" />
                                    @error('writer_image')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <h5 class="card-header mb-3">Table of Content</h5>
                    <div id="all-sections"></div>
                    <span class="float-end">
                        <button type="button" class="btn btn-primary float-end" id="add-section">
                            <i class="feather-save me-2"></i>
                            <span>Add</span>
                        </button>
                    </span>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </form>
    </div>
@endsection

@push('page-wise-js')
    <script>
        function getUrl(field_id) {
            let errors = 0;
            let blog_headline = $.trim($("#" + field_id).val());
            let id = "{{ !empty($blog->encrypted_id) ? $blog->encrypted_id : '' }}";

            // Replace '/' and spaces with '-'
            let blog_url = blog_headline.replace(/[\/\s]+/g, '-').toLowerCase();

            if (blog_headline == "" || blog_headline == undefined || blog_headline == null) {
                errors += 1;
            }
            if (blog_url == "" || blog_url == undefined || blog_url == null) {
                errors += 1;
            }

            if (errors > 0) {
                $("#blog_url").val("");
                return false;
            } else {
                // Remove invalid characters, trim extra dashes, and replace multiple dashes with a single dash
                blog_url = blog_url.replace(/[^a-z0-9-]+/g, '-').replace(/-+/g, '-').replace(/^-+|-+$/g, '');

                // Use Blade to generate the base route and append parameters dynamically
                let url = "{{ route('admin.check.blog.link', ['blog_url' => '__LINK__', 'id' => '__ID__']) }}"
                    .replace('__LINK__', blog_url)
                    .replace('__ID__', id);

                // Send GET request with parameters in the URL
                fetch(url)
                    .then(response => response.text()) // Expecting plain text response
                    .then(data => {
                        document.getElementById("blog_url").value = data; // Update input field with returned link
                        // $("#blog_url").val(data);
                    })
                    .catch(error => console.error("Error:", error));
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let rowCount = 1;

            // Function to add a new row
            function addRow(item = {}) {

                // Create the main card div
                const card = document.createElement('div');
                card.className = 'card mb-4';
                card.id = `row-${rowCount}`;

                // Create the card body
                const cardBody = document.createElement('div');
                cardBody.className = 'card-body';

                // -------------------------------------- Hidden input for ID -----------------------------------------
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'section[]';
                idInput.value = item.section_id || '';
                cardBody.appendChild(idInput);

                // ------------------------------------- Create the row (Section Title & Section Headline) ------------------------------------------
                const row1 = document.createElement('div');
                row1.className = 'row mb-3';

                // -------------------------- Section Title column ------------------------------
                const col1 = document.createElement('div');
                col1.className = 'col-6';

                // ----------- Label ------------
                const label1 = document.createElement('label');
                label1.htmlFor = `sectionTitles-${rowCount}`;
                label1.className = 'col-form-label';
                label1.textContent = 'Section Title';

                // ----------- Input field ------------
                const input1 = document.createElement('input');
                input1.type = 'text';
                input1.className = 'form-control';
                input1.id = `sectionTitles-${rowCount}`;
                input1.name = 'section_titles[]';
                input1.placeholder = 'Enter Title';
                input1.value = item.section_title || '';

                // Prevent removal of the required attribute
                Object.defineProperty(input1, 'required', {
                    configurable: false,
                    writable: false,
                    value: true,
                });

                // -------------------------- Section Headline column ------------------------------
                const col11 = document.createElement('div');
                col11.className = 'col-6';

                // --------------- Label -------------------
                const label11 = document.createElement('label');
                label11.htmlFor = `sectionHeadlines-${rowCount}`;
                label11.className = 'col-form-label';
                label11.textContent = 'Section Headline';

                // ----------- Input field ------------
                const input11 = document.createElement('input');
                input11.type = 'text';
                input11.className = 'form-control';
                input11.id = `sectionHeadlines-${rowCount}`;
                input11.name = 'section_headlines[]';
                input11.placeholder = 'Enter Headline';
                input11.value = item.section_headline || '';
                input11.required = true;

                // Prevent removal of the required attribute
                Object.defineProperty(input11, 'required', {
                    configurable: false,
                    writable: false,
                    value: true,
                });

                // -------------- Append input to column and label + column to row (Section Title & Section Headline) -----------------------
                col1.appendChild(label1);
                col1.appendChild(input1);
                col11.appendChild(label11);
                col11.appendChild(input11);
                row1.appendChild(col1);
                row1.appendChild(col11);

                // ------------------------------------- Create the row (Description) ------------------------------------------
                const row2 = document.createElement('div');
                row2.className = 'row mb-3';

                // -------------------------- Description column ------------------------------
                const col2 = document.createElement('div');
                col2.className = 'col-12';

                // --------------- Label -------------------
                const label2 = document.createElement('label');
                label2.htmlFor = `descriptions-${rowCount}`;
                label2.className = 'col-form-label';
                label2.textContent = 'Description';

                // ----------- Textarea field ------------
                const textarea1 = document.createElement('textarea');
                textarea1.id = `descriptions-${rowCount}`;
                textarea1.name = 'descriptions[]';
                textarea1.cols = 30;
                textarea1.rows = 5;
                textarea1.className = 'text-area form-control';
                textarea1.placeholder = 'Enter Description';
                textarea1.textContent = item.description || '';

                // -------------- Append input to column and label + textarea to row (Description) -----------------------
                row2.appendChild(label2);
                col2.appendChild(textarea1);
                row2.appendChild(col2);

                // ------------------------------------- Create the row (File Input) ------------------------------------------
                // const fileInputWrapper = document.createElement('div');
                // fileInputWrapper.classList.add('row', 'mb-3');

                // // -------------------------- File Input column ------------------------------
                // const fileInputCol = document.createElement('div');
                // fileInputCol.classList.add('col-6');

                // // --------------- Label -------------------
                // const fileInputLabel = document.createElement('label');
                // fileInputLabel.textContent = 'Section Image';
                // fileInputLabel.htmlFor = `sectionImages-${rowCount}`;
                // fileInputCol.appendChild(fileInputLabel);

                // // ----------- File Input field ------------
                // const fileInput = document.createElement('input');
                // fileInput.type = 'file';
                // fileInput.id = `sectionImages-${rowCount}`;
                // fileInput.name = 'section_images[]';
                // fileInput.accept = 'image/*';
                // fileInput.classList.add('form-control', 'image-input');
                // fileInput.setAttribute('data-id', rowCount); // Store row ID for preview

                // // -------------- Append input to column and label + File Input to row (File Input) -----------------------
                // fileInputCol.appendChild(fileInput);
                // fileInputWrapper.appendChild(fileInputCol);

                // // -------------------------- File Preview column ------------------------------
                // const filePreviewColumn = document.createElement('div');
                // filePreviewColumn.classList.add('col-6');

                // // // Container for Image Previews
                // // const imgPreviewContainer = document.createElement('div');
                // // imgPreviewContainer.id = `image-preview-container-${rowCount}`; // Unique container ID
                // // imgPreviewContainer.classList.add('image-preview-container');
                // // fileInputWrapper.appendChild(imgPreviewContainer);

                // // Clear previous previews
                // filePreviewColumn.innerHTML = '';

                // // Event Listener for File Input or Existing Images
                // if(item.section_images) {
                //     const file = item.section_images; // Assuming 'item.section_images' contains existing file names

                //     // Container for Image and Remove Button
                //     const previewWrapper = document.createElement('div');
                //     previewWrapper.style.display = 'inline-block';
                //     previewWrapper.style.position = 'relative';
                //     previewWrapper.style.margin = '5px';

                //     // Create Image Preview Element
                //     const imgPreview = document.createElement('img');
                //     imgPreview.style.cssText = `
            //         width: 50px;
            //         height: 50px;
            //         object-fit: cover;
            //     `;
                //     imgPreview.src = `{{ asset('${file}') }}`;

                //     // Create Remove Button
                //     const removeImageButton = document.createElement('button');
                //     removeImageButton.innerHTML = '&times;'; // "X" for close
                //     removeImageButton.style.cssText = `
            //         position: absolute;
            //         top: -5px;
            //         right: -5px;
            //         width: 20px;
            //         height: 20px;
            //         background: red;
            //         color: white;
            //         border: none;
            //         border-radius: 50%;
            //         font-size: 14px;
            //         cursor: pointer;
            //     `;

                //     // Remove Button Click Event
                //     removeImageButton.onclick = function () {
                //         previewWrapper.remove(); // Remove the image preview container
                //         console.log(`Removed image: ${file}`);
                //     };

                //     // Append Image and Remove Button to Wrapper
                //     previewWrapper.appendChild(imgPreview);
                //     previewWrapper.appendChild(removeImageButton);

                //     // Append Wrapper to the Container
                //     // filePreviewColumn.appendChild(previewWrapper);
                // }


                // // Loop through selected files and create previews with remove buttons
                // if (files != null && files != undefined) {
                //     if (files[0].length > 0) {
                //         Array.from(files).forEach((file) => {
                //             // Container for Image and Remove Button
                //             const previewWrapper = document.createElement('div');
                //             previewWrapper.style.display = 'inline-block';
                //             previewWrapper.style.position = 'relative';
                //             previewWrapper.style.margin = '5px';

                //             // Create Image Preview Element
                //             const imgPreview = document.createElement('img');
                //             imgPreview.style.cssText = `
            //                 width: 50px;
            //                 height: 50px;
            //                 object-fit: cover;
            //             `;
                //             imgPreview.src = "{{ asset('"+file+"') }}";

                //             // Create Remove Button
                //             const removeButton = document.createElement('button');
                //             removeButton.innerHTML = '&times;'; // "X" for close
                //             removeButton.style.cssText = `
            //                 position: absolute;
            //                 top: -5px;
            //                 right: -5px;
            //                 width: 20px;
            //                 height: 20px;
            //                 background: red;
            //                 color: white;
            //                 border: none;
            //                 border-radius: 50%;
            //                 font-size: 14px;
            //                 cursor: pointer;
            //             `;

                //             // Remove Button Click Event
                //             removeButton.onclick = function () {
                //                 previewWrapper.remove(); // Remove the image preview container
                //                 console.log(`Removed image: ${file}`);
                //             };

                //             // Append Image and Remove Button to Wrapper
                //             previewWrapper.appendChild(imgPreview);
                //             previewWrapper.appendChild(removeButton);

                //             // Append Wrapper to the Container
                //             imgPreviewContainer.appendChild(previewWrapper);
                //         });
                //     }
                // }

                // Append Image Preview Container
                // filePreviewColumn.appendChild(imgPreviewContainer);
                // fileInputWrapper.appendChild(filePreviewColumn);

                const buttonsDiv = document.createElement('div');
                buttonsDiv.classList.add('float-end');

                // // Add Button
                // const addButton = document.createElement('button');
                // addButton.type = 'button';
                // addButton.classList.add('btn', 'btn-primary', 'btn-icon', 'rounded-pill', 'me-1');
                // addButton.style.fontSize = '1.7em';
                // addButton.innerHTML = `+`;
                // addButton.onclick = function () {
                //     addRow();
                // };

                // Remove Button
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.classList.add('btn', 'btn-danger', 'btn-icon');
                removeButton.innerHTML = `<i class="feather-trash me-2"></i><span>Remove</span>`;
                removeButton.onclick = function() {
                    if (item.section_id != "" && item.section_id != undefined && item.section_id != null) {
                        $.ajax({
                            url: "{{ route('admin.delete.blog.section') }}",
                            method: "POST",
                            data: {
                                "_token": '{{ csrf_token() }}',
                                'section': item.section_id
                            },
                            success: function(res) {
                                card.remove();
                            }
                        });
                    } else {
                        card.remove();
                    }
                };

                // buttonsDiv.appendChild(addButton);
                buttonsDiv.appendChild(removeButton);

                // Append rows to card body
                cardBody.appendChild(buttonsDiv);
                cardBody.appendChild(row1);
                cardBody.appendChild(row2);
                // cardBody.appendChild(fileInputWrapper);

                // Append card body to card
                card.appendChild(cardBody);

                // Append the new row to the form
                document.getElementById('all-sections').appendChild(card);

                // Initialize TinyMCE for the newly created textarea
                tinymce.init({
                    selector: `.text-area`, // Target the newly created textarea by its ID
                    plugins: 'a11ychecker advcode advlist advtable anchor autocorrect autolink autoresize autosave casechange charmap checklist code codesample directionality editimage emoticons export footnotes formatpainter fullscreen help image importcss inlinecss insertdatetime link linkchecker lists media mediaembed mentions mergetags nonbreaking pagebreak pageembed permanentpen powerpaste preview quickbars save searchreplace table tableofcontents template tinycomments tinydrive tinymcespellchecker typography visualblocks visualchars wordcount',
                    toolbar: 'undo redo | blocks| bold italic | bullist numlist checklist | code | table | alignleft aligncenter alignright alignjustify | outdent indent | wordcount | a11ycheck advtablerownumbering typopgraphy anchor restoredraft casechange charmap checklist code codesample addcomment showcomments ltr rtl editimage fliph flipv imageoptions rotateleft rotateright emoticons export footnotes footnotesupdate formatpainter fullscreen help image insertdatetime link openlink unlink bullist numlist media mergetags mergetags_list nonbreaking pagebreak pageembed permanentpen preview quickimage quicklink quicktable cancel save searchreplace spellcheckdialog spellchecker',
                    resize: 'both'
                });

                rowCount++;
            }

            @if (!empty($blog->encrypted_id))

                // Fetch data from the server (get_sub_section_data.php) and add rows
                fetch("{{ route('admin.get.blog.section', $blog->encrypted_id) }}")
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(item => {
                            addRow(item);
                        });
                    });
            @endif

            // Event listener to add a new blank row when "Add Row" button is clicked
            document.getElementById('add-section').addEventListener('click', () => {
                addRow();
            });
        });
    </script>
@endpush

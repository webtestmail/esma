<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class TestimonialsController extends Controller
{
    public function manageTestimonials()
    {
        $testimonials = Testimonials::select('id', 'position_order', 'client_name', 'client_image', 'rating_quantity', 'status')->get();
        foreach ($testimonials as $testimonial) {
            $testimonial->encrypted_id = Crypt::encrypt($testimonial->id);
        }
        $currentPage = "manage_testimonials";
        $model = Crypt::encrypt('Testimonials');
        return view('admin.manage_testimonials', ['testimonialsData' => $testimonials, 'model' => $model, 'currentPage' => $currentPage]);
    }

    public function addTestimonial(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'client_name' => 'required|string',
                'rating_quantity' => 'required|string',
            ], [
                'client_name.required' => 'The client name is required.',
                'client_name.string' => 'The client name must be a string.',
                'rating_quantity.required' => 'The rating quantity is required.',
                'rating_quantity.string' => 'The rating quantity must be a string.',
            ]);

            $page_order = Testimonials::max('position_order');
            $position_order = ($page_order !== null) ? $page_order + 1 : 1;

            $testimonial = [
                'position_order' => $position_order,
                'client_name' => $request->client_name,
                'client_designation' => $request->client_designation,
                'review_date' => $request->review_date,
                'rating_quantity' => $request->rating_quantity,
                'description' => htmlspecialchars($request->description, ENT_QUOTES),
            ];

            if (!empty($request->file('client_image'))) {
                $path = 'images/testimonials/';
                $filePath = $this->storeImage($request->file('client_image'), $path);
                $testimonial['client_image'] = $filePath;
            }

            if (Testimonials::create($testimonial)) {
                session()->flash('success', 'Testimonial is inserted Successfully!');
                return redirect()->route('admin.manage_testimonials');
            } else {
                session()->flash('error', 'Insertion Error!');
                return redirect()->route('admin.add.testimonial');
            }
        } else {
            $currentPage = "manage_testimonials";
            return view('admin.testimonial-ops', ['currentPage' => $currentPage]);
        }
    }

    public function editTestimonial(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->validate([
                'client_name' => 'required|string',
                'rating_quantity' => 'required|string',
            ], [
                'client_name.required' => 'The client name is required.',
                'client_name.string' => 'The client name must be a string.',
                'rating_quantity.required' => 'The rating quantity is required.',
                'rating_quantity.string' => 'The rating quantity must be a string.',
            ]);

            $id = Crypt::decrypt($request->testimonial);
            $testimonial = Testimonials::findOrFail($id);
            $testimonial->client_name = $request->client_name;
            $testimonial->client_designation = $request->client_designation;
            $testimonial->review_date = $request->review_date;
            $testimonial->rating_quantity = $request->rating_quantity;
            $testimonial->description = htmlspecialchars($request->description, ENT_QUOTES);

            if (!empty($request->file('client_image'))) {
                $path = 'images/testimonials/';
                $filePath = $this->storeImage($request->file("client_image"), $path, $testimonial->client_image);
                $testimonial->client_image = $filePath;
            }

            if ($testimonial->save()) {
                session()->flash('success', 'Testimonial is updated Successfully!');
                return redirect()->route('admin.manage_testimonials');
            } else {
                session()->flash('error', 'Updation Error!');
                return redirect()->route('admin.edit.testimonial', $request->testimonial);
            }
        } else {
            $id = Crypt::decrypt($request->testimonial);
            $testimonial = Testimonials::where('id', $id)->firstOrFail();
            $testimonial->encrypted_id = $request->testimonial;
            $currentPage = "manage_testimonials";
            return view('admin.testimonial-ops', ["testimonial" => $testimonial, 'currentPage' => $currentPage]);
        }
    }

    public function getAllTestimonials()
    {
        return Testimonials::where('status', 'active')->orderBy('position_order')->get();
    }
}

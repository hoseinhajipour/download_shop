<?php

namespace App\Components\Pages;

use App\Mail\TestMail;
use App\Models\Job;
use App\Models\Resume;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SingleJob extends Component
{
    use LivewireAlert;

    public $job;

    public function route()
    {
        return Route::get('/job/{id}')
            ->name('job');
    }

    public function mount($id)
    {
        $this->job = Job::find($id);
    }

    public function render()
    {
        return view('pages.single-job');
    }

    public function SendResume()
    {
        $resume = Resume::where('user_id', Auth::user()->id)
            ->where('job_id', $this->job->id)
            ->first();
        if (!$resume) {
            $resume = new Resume();
            $resume->user_id = Auth::user()->id;
            $resume->job_id = $this->job->id;
            $resume->employer_id = $this->job->user_id;
            $resume->status = "pending";
            $resume->save();

            //send mail to employer
/*
            $details = [
                'title' => 'یک درخواست رزومه ارسال شد',
                'job_name' => $this->job->title,
                'name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ];
            Mail::to($this->job->authorId->email)->send(new TestMail($details));
         */

            $this->alert('success', 'ارسال شد', ['position' => 'center']);
        } else {
            $this->alert('warning', 'قبل ارسال شده است', ['position' => 'center']);
        }
        return redirect()->route('dashboard.MyRequest');
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = User::paginate(config('user.paginate'));

        return view('user.index', ['user' => $user]);
    }

    private function upload($file) {
        $destinationFolder = public_path() . '/' . config('user.image_path');

        try {
            if($file == null) {
                return [
                    'status' => 'null',
                    'file_name' => ''
                ];
            }
            $fileName = $file->getClientOriginalName() . '_' . date('Ymd_His');
            $imageFileType = $file->getClientOriginalExtension();
            $extList = ['jpg', 'png', 'jpeg', 'gif'];
            if(!in_array(strtolower($imageFileType), $extList)) {
                $result = [
                    'status' => 'false',
                    'msg' => __('products.msg'),
                ];
            }else {
                $file->move($destinationFolder, $fileName);
                $result = [
                    'status' => 'true',
                    'file_name' => $fileName,
                ];
            }
        } catch (Exception $e) {
            $msg = $e->getMessage();
            $result = [
                'status' => 'false',
                'msg' => $msg,
            ];
        }

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $user = User::find($id);
        if (!$user) {
            return back()->with('status', __('user.not_exist'));
        }

        return view('user.show', ['user' => $user]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);
        if(!$user) {
            return back()->with('status', __('user.not_exist'));
        }

        if (auth()->id() != $user->id) {
            return back()->with('status', __('user.not_permission'));

        }

        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id$data['image']
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id) {
        $data = $request->only([
            'name',
            'email',
            'phone_number',
            'image',
            'address',
            'role',
        ]);

        try {
            $user = User::find($id);

            if(!$user){
                return back()->with('status', __('user.not_exist'));
            }

            if (auth()->id() != $user->id) {
                return back()->with('status', __('user.not_permission'));

            } else {
                $result = $this->upload($request->image);

                if($result['status'] == 'true') {
                    $data['image'] = $result['file_name'];
                }

                if($result['status'] == 'null') {
                    unset($data['image']);
                }

                if($result['status'] == 'false') {
                    return redirect()->route('user.index')->with('status', $result['msg']);
                }

                $user->update($data);

            }
        } catch (Exception $e) {
            return back()->with('status', __('user.fail'));
        }

        return redirect(route('user.show', $user->id))->with('status', __('user.status'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        try {
            $user = User::find($id);

            if(!$user) {
                return back()->with('status', __('user.not_exist'));
            }

            if(auth()->id() == $user->id) {
                return back()->with('status', __('user.not_permission'));
            }

            if($user->role ==1) {
                return back()->with('status', __('user.not_del'));
            }
            $user->delete();
        } catch (Exception $e) {
            return redirect(route('user.index'))->with('status', $e->getMessage());
        }

        return redirect(route('user.index'))->with('status', __('user.status'));
    }
}

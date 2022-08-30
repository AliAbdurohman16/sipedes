<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if($arguments[0] == 'loggedInPenduduk'){
            if (!session()->has('penduduk')) {
                return redirect()->to('login');
            }
        }else if($arguments[0] == 'loggedInAdmin'){    
            if (!session()->has('user')) {
                return redirect()->to('admin/login');
            }
        } else if($arguments[0] == 'loginPenduduk') {
            if (session()->has('penduduk')) {
                return redirect()->to('user/dashboard');
            }
        } else if($arguments[0] == 'loginAdmin') {
            if (session()->has('user')) {
                return redirect()->to('admin/dashboard');
            }
        } else if($arguments[0] == 'logoutPenduduk') {
            if (!session()->has('penduduk')) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if($arguments[0] == 'logoutAdmin') {
            if (!session()->has('user')) {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else if($arguments[0] == 'forgotPassword') {
            if (session()->has('user')) {
                session()->remove('user');
                return redirect()->to('admin/forgot_password');
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

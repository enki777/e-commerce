import React, { Component } from 'react';

export default class CategoryCreate extends Component {
    render() {
        return (
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'card'}>
                            <div className={'card-header'}>
                                <h1 className={'card-title'}>Create Category</h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={'/api/admin/category/store'}>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'} />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <div className={'col-6 offset-4'}>
                                            <button className={'btn btn-primary'}>
                                                Create
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div className='card-footer'>
                                <a href='/admin/category'>Back to dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

import React, { Component } from 'react';
import axios from 'axios';

export default class GameCreate extends Component {
    constructor(props) {
        super(props);
        this.state = {
            categories: [],
        };
    }

    componentDidMount() {
        axios.get('/api/admin/game/create').then(res => {
            this.setState({
                categories: res.data,
            });
        });
    }

    render() {
        return (
            <div className={'container'}>
                <div className={'row justify-content-center'}>
                    <div className={'col-8'}>
                        <div className={'card'}>
                            <div className={'card-header'}>
                                <h1 className={'card-title'}>
                                    Create Game
                                </h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={'/api/admin/game/store'} encType={'multipart/form-data'}>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'} />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Image</label>
                                        <div className={'col-6'}>
                                            <div className={'custom-file'}>
                                                <input type="file" className="custom-file-input" name={'image'} />
                                                <label className="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Categories</label>
                                        <div className={'col-6'}>
                                            <div className={'form-check mt-2'}>
                                                {this.state.categories.map(category => (
                                                    <div key={category.id}>
                                                        <input className={'form-check-input'} type={'checkbox'}
                                                            name={'categories[]'} value={category.id} />
                                                        <label className={'form-check-label'}>{category.name}</label>
                                                    </div>
                                                ))}
                                            </div>
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
                                <a href='/admin/game'>Back to dashboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

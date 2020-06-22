import React, { Component } from 'react';
import axios from 'axios';

export default class CategoryEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            category: {},
            value: '',
        };
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({ value: event.target.value });
    }

    componentDidMount() {
        const id = this.props.match.params.id;
        axios.get(`/api/admin/category/edit/${id}`).then(res => {
            this.setState({
                category: res.data,
                value: res.data.name,
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
                                <h1 className={'card-title'}>Edit Category</h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={`/api/admin/category/update/${this.state.category.id}`}>
                                    <input type={'hidden'} name={'_method'} value={'PATCH'} />
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'}
                                                value={this.state.value} onChange={this.handleChange} />
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <div className={'col-6 offset-4'}>
                                            <button className={'btn btn-success'}>
                                                Update
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

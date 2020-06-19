import React, {Component} from 'react';
import axios from 'axios';

export default class GameEdit extends Component {
    constructor(props) {
        super(props);
        this.state = {
            game: {},
            categories: [],
            value: '',
        };
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({value: event.target.value})
    }

    componentDidMount() {
        const id = this.props.match.params.id;
        axios.get(`/api/admin/game/edit/${id}`).then(res => {
            this.setState({
                game: res.data['game'],
                categories: res.data['categories'],
                value: res.data['game'].name,
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
                                    Edit Game
                                </h1>
                            </div>
                            <div className={'card-body'}>
                                <form method={'post'} action={`/api/admin/game/update/${this.state.game.id}`} encType={'multipart/form-data'}>
                                    <input type={'hidden'} name={'_method'} value={'PATCH'}/>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Name</label>
                                        <div className={'col-6'}>
                                            <input className={'form-control'} type={'text'} name={'name'}
                                                   value={this.state.value} onChange={this.handleChange}/>
                                        </div>
                                    </div>
                                    <div className={'form-group row'}>
                                        <label className={'col-4 col-form-label text-right'}>Image</label>
                                        <div className={'col-6'}>
                                            <div className={'custom-file'}>
                                                <input type="file" className="custom-file-input" name={'image'}/>
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
                                                               name={'categories[]'} value={category.id}/>
                                                        <label className={'form-check-label'}>{category.name}</label>
                                                    </div>
                                                ))}
                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

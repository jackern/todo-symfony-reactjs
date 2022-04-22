import React, { useContext } from 'react';
import Dialog from '@mui/material/Dialog';
import PropTypes from 'prop-types';
import { Button, DialogActions, DialogContent, DialogTitle } from '@mui/material';
import { TodoContext } from '../contexts/TodoContext';

function DeleteDialog(props) {
    const context = useContext(TodoContext);

    const hide = () => {
        props.setDeleteConfirmationIsShown(false);
    }

    return (
        <Dialog onClose={hide} fullWidth={true} open={props.open}>
            <DialogTitle>Are you sure you wish to remove this to-do? This action cannot be undone</DialogTitle>
            <DialogContent>
                This is the task I am deleting
            </DialogContent>
            <DialogActions>
                <Button onClick={hide}>Cancel</Button>
                <Button onClick={() => {
                    context.deleteTodo({id: props.todo.id, name: props.todo.name});
                    hide();
                }}>
                    Delete
                </Button>
            </DialogActions>
        </Dialog>
    );
}

DeleteDialog.propTypes = {
    open: PropTypes.bool.isRequired,
    setDeleteConfirmationIsShown: PropTypes.func.isRequired,
    todo: PropTypes.shape = ({
        id: PropTypes.number,
        name: PropTypes.string,
    })
};

export default DeleteDialog;
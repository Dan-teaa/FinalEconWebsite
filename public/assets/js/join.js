document.addEventListener('DOMContentLoaded', () => {
    const joinForm = document.querySelector('#joinForm');

    if (joinForm) {
        joinForm.addEventListener('joinButton', async (event) => {
            const formData = new FormData(joinForm);
            const payload = Object.fromEntries(formData.entries()); // Convert to a plain object

            try {
                const response = await fetch('/join/submit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    
                });

            } 
        };
    }
});

export const formatPrice = (amount) => {
    if (parseInt(amount) > 0) {
        return `+$${amount}`
    }

    return `-$${Math.abs(amount)}`;
}